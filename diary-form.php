<div class="modal">
    <div class="modal-main">
        <button class="modal-close">&#10006;</button>
        <!-- <img src="./book-posters/<?php echo $book_poster ?>.png" style="width: 80%;height: 200px;" alt="Постер книги" /> -->

        <form action="diary-form-processing.php?book_id=<?=$book_id?>" method="post" style="text-align: center;">
            <h3>
                <?= $book_name ?>.</h1>
                <br>
                <label for="watchDate">Дата:</label>
                <input type="date" name="watchDate" id="watchDate" min="2015-01-01" max="2040-01-01" />
                <br>
                <br>
                <label for="myReview">Ревью:</label>
                <textarea name="myReview" id="myReview" cols="30" row="3"></textarea>
                <br>
                <button type="submit">Сохранить</button>
        </form>

    </div>
</div>