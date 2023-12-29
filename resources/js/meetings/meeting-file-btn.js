let fileInput = document.querySelector('.meeting-create__uploadsinp');
console.log(fileInput);
let fileLabel = document.querySelector('.meeting-create__uploadslabel');
fileInput.addEventListener('change', function() {
    if(fileInput.files.length > 1){
        fileLabel.innerHTML = fileInput.files.length + ' файлов выбрано';
    }
    else {
        if(fileInput.files[0].name.length > 15){
            fileLabel.innerHTML = fileInput.files[0].name.slice(0, 15) + '...';
        }
        else{
            fileLabel.innerHTML = fileInput.files[0].name;
        }
    }
})

let fileInputUpdate = document.querySelector('.meeting-update__uploadsinp');
let fileLabelUpdate = document.querySelector('.meeting-update__uploadslabel');
fileInputUpdate.addEventListener('change', function() {
    if(fileInputUpdate.files.length > 1){
        fileLabelUpdate.innerHTML = fileInputUpdate.files.length + ' файлов выбрано';
    }
    else {
        if(fileInputUpdate.files[0].name.length > 15){
            fileLabelUpdate.innerHTML = fileInputUpdate.files[0].name.slice(0, 15) + '...';
        }
        else{
            fileLabelUpdate.innerHTML = fileInputUpdate.files[0].name;
        }
    }
})
