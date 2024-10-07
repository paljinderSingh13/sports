document.getElementById('dateInput').addEventListener('input', function(event) {
    const input = event.target;
    let value = input.value;

    // Remove any non-numeric characters
    value = value.replace(/\D/g, '');

    // Apply formatting (MM/DD/YYYY)
    if (value.length >= 3 && value.length <= 4) {
        value = value.replace(/^(\d{2})(\d{1,2})/, '$1/$2');
    } else if (value.length > 4) {
        value = value.replace(/^(\d{2})(\d{2})(\d{1,4})/, '$1/$2/$3');
    }

    // Set the formatted value back to the input
    input.value = value.slice(0, 10);;
});