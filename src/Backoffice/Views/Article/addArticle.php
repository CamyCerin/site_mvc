<form method='post' action="<?php echo BASE_URL ?>?action=addArticle" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Titre</label>
        <input type="text" name='title' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Contenu</label>
        <textarea name='content' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
    </div>
    <div>
        <label for="formFileLg" class="form-label">Image</label>
        <input class="form-control form-control-lg" onchange="loadFile(event)" name="picture" id="formFileLg"
               type="file">
        <input type="hidden" id="maphoto" value="">
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-5 text-center">

            <img id="image" style='width:300px'>
        </div>


    </div>

    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<script>

    let loadFile = function (event) {
        let image = document.getElementById('image');
        let photo = document.getElementById('maphoto');
        console.log(event.target.files[0].name);
        image.src = URL.createObjectURL(event.target.files[0]);
        photo.value = event.target.files[0].name;
    };

</script>