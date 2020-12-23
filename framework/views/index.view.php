<!DOCTYPE html>


    <body>

        Hello World! <br/>

        <h3>Your task</h3>
        <?php 

            foreach($tasks as $task) {

                echo $task->task;
                echo '<br/>';

            }
        
        ?>

        <form method="POST" action="/send">
        
            <input type="text" name="task" />

            <input type="submit" name="submit" />

        </form>

    </body>

</html>