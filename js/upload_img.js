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



    function showPreview_edit_image() {
        var input = document.getElementById('imagen');
        var preview = document.getElementById('current-image');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
        }
    }
