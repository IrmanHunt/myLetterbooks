<div class="modal modal1"></div>

<div id="modal2" class="modal modal2">

    <div class="modal-main">

        <button class="modal-close">&#10006;</button>

        <form action="/forms/writer-form-processing.php" method="post" enctype="multipart/form-data" style="text-align: left;">

            <input type="text" class="form-control" name="name" id="name" placeholder="Писатель" required />
            <br />
            <textarea name="bio" class="form-control" id="bio" cols="30" row="3" placeholder="Биография" required></textarea>
            <br />
            <label for="poster">Портрет:</label>
            <input type="file" class="form-control" name="portrait" id="portrait" accept=".png" required/>
            <br />
            <button type="submit" class="btn btn-success">Сохранить</button>

        </form>

    </div>

</div>
