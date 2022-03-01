    <main class="my-3 mx-5 px-5 d-flex flex-column align-items-center w-90">

        <?php foreach ($message->getAllMessages() as $message) : ?>
            <figure class='m-3 p-3 border border-secondary w-50'>
                    <blockquote class="blockquote">
                        <?= $message["message"] ?>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        by <cite> <?= $message["login"] ?> </cite>
                    </figcaption>
            </figure>
        <?php endforeach; ?>
        
        <?php if(isset($_SESSION["id"])) : ?>
            <form method="POST" class="w-50">
                <div class="form-group">
                    <label for="messageGrp"> Message : </label>
                    <textarea name="message" class="form-control"></textarea>
                </div>
                <input class="form-group btn btn-success mt-2 mx-2 rounded-pill" type="submit" name="reg_msg" value="Envoyer mon message">
            </form>
        <?php endif; ?>

    </main>