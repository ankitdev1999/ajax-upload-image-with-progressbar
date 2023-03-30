


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>



<form id="form_up"    method="post" enctype="multipart/form-data">
    <input    id="filepath" type="file" name="fileToUpload"><br>
    <input id="btn" type="button" onclick="uploadfile()"  value="Upload File to Server">
</form>

<div class="progress">
    <div id="bar" class="progress-bar progress-bar-striped progress-bar-animated bar" role="progressbar" aria-valuenow="75"
         aria-valuemin="0" aria-valuemax="100" style="width:0%"></div>
</div>

<div id="status"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

<script >

    function _(id){
        return document.getElementById(id);
    }

    function uploadfile() {
        foram =_('form_up');
        ajax =new   XMLHttpRequest();
        ajax.open('POST','upload.php')

        ajax.upload.addEventListener("progress", function (e){
            percent = Math.round((e.loaded/e.total)*100)
            _('bar').style.width= percent+'%'

            _('status').innerHTML ='upload '+e.loaded+'outof '+e.total
            console.log(e)
        })

        ajax.addEventListener("load", e=> {
            _('bar').style.width= ''
            _('status').innerHTML ='uploaded'
           foram.reset()
        })

        formdata =new FormData(foram)
        ajax.send(formdata)
        // console.log(formdata)
        console.log(_('filepath').files)

        // ajax.setRequestHeader('Content-Type','multipart/form-data')

    }


</script>


</body>
</html>