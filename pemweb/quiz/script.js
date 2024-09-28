const display = document.getElementById('display');
const toggleThemeButton = document.getElementById('toggleTheme');
const iconSun = document.getElementById('icon-sun');
const iconMoon = document.getElementById('icon-moon');
const powerButton = document.getElementById('icon-power');
const buttons = document.querySelectorAll('button');
const MAX_LENGTH = 14;


let input = '';
let history = '';
let result = '';
let powerOn = false;

buttons.forEach(button => {
    if (button !== powerButton) {
        button.disabled = true;
    }
});

function updateDisplay() {
    if (history.includes('/')) {
        history = history.replace(/\//g, '÷');
    } else if (history.includes('*')) {
        history = history.replace(/\*/g, 'x');
    } else if (history.includes('/100')) {
        history = history.replace(/\/100/g, '%');
    }
    display.innerHTML = `<span style="font-size: 14px; color: gray;">${history}</span><br/><span style="font-size: 24px;">${input}</span>`;
}

function buttonPress(value) {
    if (!powerOn) return;

    if (value === '0' && input === '0') {
        return;
    }
    if (input === '0' && value !== '0') {
        input = value.slice(0, -1);
    }
    if (value === 'C') {
        input = '';
        result = '';
        history = '';
    } else if (value === '←') {
        input = input.slice(0, -1);
    } else if (value === '=') {
        try {

            if (input.includes('x')) {
                input = input.replace(/x/g, '*');
            }
            if (input.includes('÷')) {
                input = input.replace(/÷/g, '/');
            }
            if (input.includes('%')) {
                input = input.replace(/%/g, '/100');
            }


            result = eval(input).toString();

            history = `${input} = ${result}`;
            input = result;

        } catch {
            result = 'Error';
            input = '';
        }
    } else {
        if (input.length >= MAX_LENGTH) {
            return;
        }
        input += value;
    }

    updateDisplay();
}


powerButton.addEventListener('click', () => {
    if (!powerOn) {
        powerOn = true;
        buttons.forEach(button => button.disabled = false);
        display.innerHTML = `<span style="font-size: 24px;">Selamat Datang</span>`;
        setTimeout(() => {
            input = '';
            history = '';
            updateDisplay();
        }, 2000);
    }
});

document.querySelectorAll('button').forEach(button => {
    button.addEventListener('click', () => {
        const value = button.textContent;
        if (value === '←') {
            buttonPress('←');
        } else if (value !== '=') {
            if (isNaN(value) && isNaN(input[input.length - 1])) {
                return;
            }
            buttonPress(value);
        } else {
            buttonPress('=');
        }
    });
});

toggleThemeButton.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme');

    if (document.body.classList.contains('dark-theme')) {
        iconSun.style.display = 'none';
        iconMoon.style.display = 'inline';

    } else {
        iconSun.style.display = 'inline';
        iconMoon.style.display = 'none';
    }
});
