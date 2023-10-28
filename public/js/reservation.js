document.addEventListener('DOMContentLoaded', function () {
    const steps = document.querySelectorAll('.step');
    const prevButton = document.getElementById('prev-button');
    const nextButton = document.getElementById('next-button');
    const stepContent = document.querySelectorAll('.step-content');
    let currentStep = 0;

    function updateProgressBar() {
        steps.forEach((step, index) => {
            if (index < currentStep) {
                step.classList.add('step-active');
            } else if (index === currentStep) {
                step.classList.add('step-active');
            } else {
                step.classList.remove('step-active');
            }
        });

        stepContent.forEach((content, index) => {
            if (index === currentStep) {
                content.classList.remove('hidden');
            } else {
                content.classList.add('hidden');
            }
        });

        // Check if we are on the last step and change the button text accordingly
        if (currentStep === steps.length - 1) {
            nextButton.textContent = 'Submit';
        } else {
            nextButton.textContent = 'Next';
        }
    }

    prevButton.addEventListener('click', function () {
        if (currentStep > 0) {
            currentStep--;
            updateProgressBar();
        }
    });

    nextButton.addEventListener('click', function () {
        if (currentStep < steps.length - 1) {
            currentStep++;
            updateProgressBar();
        }
    });

    const decrementButton = document.getElementById('decrement');
    const incrementButton = document.getElementById('increment');
    const numberInput = document.getElementById('number');

    let currentValue = 0;

    decrementButton.addEventListener('click', () => {
        currentValue = Math.max(0, currentValue - 1);
        numberInput.value = currentValue;
    });

    incrementButton.addEventListener('click', () => {
        currentValue++;
        numberInput.value = currentValue;
    });

    

});