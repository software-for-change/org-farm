<?php

echo "    <footer>
    
    <div class='w3-row'>
    <hr>
    <div class='w3-third w3-center'>
        <p>
            Designed by <a href='https://kesamercy.github.io/nekesa-mercy/' target='_blank'>NEKESA MERCY</a>
        </p>
    </div>
    <div class='w3-third w3-center'>
        <p class='w3-center'> Copy right 2020</p>
        <div class='sharethis-inline-follow-buttons follow-buttons'></div>
    </div>
    <div class='w3-third w3-center'>
        <p>Contact Us</p>
        <div class='w3-container'>
        <button onclick=\"document.getElementById('id01').style.display='block'\" class='w3-button w3-orange'>Feedback</button>
        <div id='id01' class='w3-modal'>
        <div class='w3-modal-content'>
          <div class='w3-container'>
            <span onclick=\"document.getElementById('id01').style.display='none'\" class='w3-button w3-display-topright'>&times;</span>
            <p>PLease let us know any feedback you have</p>
            <form action='action_page.php'>
            <textarea placeholder='Tell us what you think' name='feedback' rows='4' cols='50'>
            </textarea>
            <br><br>
            <input type='submit' value='Submit'>
            </form>
          </div>
        </div>
</div>
</footer> ";
?>