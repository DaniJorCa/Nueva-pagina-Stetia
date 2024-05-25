function showPreview() {
    var input = document.querySelector('input[type=file]');
    var preview = document.querySelector('#preview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}


