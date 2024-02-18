<div id="modal1" class="modal modal1">
    <div class="modal-main">
        <button class="modal-close">&#10006;</button>
        <!-- <img src="./book-posters/<?php echo $book_poster ?>.png" style="width: 80%;height: 200px;" alt="Постер книги" /> -->

        <form action="diary-form-processing.php?book_id=<?= $book_id ?>" method="post" style="text-align: left;">
            <h3>
                <?= $book_name ?>.</h1>
                <br />
                <label for="watchDate">Дата:</label>
                <input type="date" class="form-control" name="watchDate" id="watchDate" min="2015-01-01"
                    max="2040-01-01" required />
                <br />
                <textarea name="myReview" class="form-control" id="myReview" cols="30" row="3"
                    placeholder="Ревью"></textarea>
                <br />
                <label for="like">Лайк:</label>
                <input type="checkbox" name="like" id="like"></input>
                <br />
                <label for="reread">Перечитал:</label>
                <input type="checkbox" name="reread" id="reread"></input>
                <br />
                <div class="diary-star-widget">
                    <input type="radio" name="rating" id="rate-5" value="5">
                    <label for="rate-5">&#9733;</label>
                    <input type="radio" name="rating" id="rate-4" value="4">
                    <label for="rate-4">&#9733;</label>
                    <input type="radio" name="rating" id="rate-3" value="3">
                    <label for="rate-3">&#9733;</label>
                    <input type="radio" name="rating" id="rate-2" value="2">
                    <label for="rate-2">&#9733;</label>
                    <input type="radio" name="rating" id="rate-1" value="1">
                    <label for="rate-1">&#9733;</label>
                    <input type="radio" name="rating" id="rate-0" value="0">
                    <label for="rate-0" style="font-size: 6px;">&#10006;</label>
                </div>
                <button type="submit" class="btn btn-success">Сохранить</button>




        </form>

    </div>
</div>