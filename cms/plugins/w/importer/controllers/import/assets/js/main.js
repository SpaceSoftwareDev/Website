$(() => {
    $('#files-upload #custom-content').hide()

    $('#files-upload #customFile:file').change(function () {
        const files = this.files

        $('#files-upload #custom-content').show()

        if (!$('#uploaded-files-label').length)
            $('#files-upload #custom-content').prepend('<h5 id="uploaded-files-label">Uploaded files:</h5>')

        $('#files-upload ul').html('')

        Object.values(files).forEach((file) => {
            $('#files-upload ul').append(`<li>${file.name}</li>`)
        })
    })

})
