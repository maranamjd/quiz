<div class="container">
    <form method="post" action="<?php echo URL ?>user/update">
      <input type="text" name="uname" placeholder="Username" value="<?php echo $this->user['username'] ?>">
      <input type="hidden" name="id" value="<?php echo $this->user['id'] ?>">
    
     <button name="submit" type="submit">update</button>
    </form>
</div>