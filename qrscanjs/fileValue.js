function fileValue(value) {
    var path = value.value;
    var extenstion = path.split('.').pop().toLowerCase();
    if (['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg'].indexOf(extenstion) !== -1) {
        document.getElementById('image-preview').src = window.URL.createObjectURL(value.files[0]);
        var filename = path.replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
        document.getElementById("filename").innerHTML = filename;
    } else {
        alert("File not supported. Please upload an image file of the following extensions: .jpg, .jpeg, .png, .gif, .bmp, .webp or .svg");
    }
}