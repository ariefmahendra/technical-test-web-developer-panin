import './bootstrap';

const datepickerEl = document.getElementById('dateId');
new Datepicker(datepickerEl, {
    format: 'dd-mm-yyyy',
    language: 'en',
});
