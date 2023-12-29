let meetingId = document.querySelector('.meeting-update__form').id;
console.log(meetingId)
let deleteFilesBtn = document.querySelectorAll('.meeting-update__delete-file');
console.log(files);

deleteFilesBtn.forEach((file) => {
    file.addEventListener('click', function() {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'https://myoggetto/meetings/lector/' + meetingId + '/' + file.id )
        xhr.setRequestHeader('apikey', '283ab0a132c066d7');
        xhr.onload = function () {
            console.log(xhr.status);
            const data = JSON.parse(xhr.response);
            console.log(data);
        }

        xhr.send();
    })
})


