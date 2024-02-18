<div class="modal modal1"></div>

<div id="modal2" class="modal modal2">

    <div class="modal-main">

        <button class="modal-close">&#10006;</button>

        <form action="books-form-processing.php" method="post" enctype="multipart/form-data" style="text-align: left;">

            <input type="text" class="form-control" name="name" id="name" placeholder="Книга" required />
            <br />
            <input type="number" class="form-control" name="year" id="year" min="-5000" max="2050" placeholder="Год" required />
            <br />
            <input type="text" class="form-control" name="author" id="author" placeholder="Автор" required />
            <br />
            <input type="number" class="form-control" name="pages" id="pages" min="1" max="100000" placeholder="Страниц: ~" required />
            <br />
            <textarea name="description" class="form-control" id="description" cols="30" row="3" placeholder="Описание" required></textarea>
            <br />
            <label for="poster">Постер:</label>
            <input type="file" class="form-control" name="poster" id="poster" accept=".png" required/>
            <br />
            <button type="submit" class="btn btn-success">Сохранить</button>

        </form>

    </div>

</div>
