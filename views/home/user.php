<div class="container">
    <form method="post" action="<?php echo URL ?>user/create">
      <input type="text" name="uname" placeholder="Username">
    
     <button name="submit" type="submit">Add</button>
    </form>
</div>

<div class="container">
  <table class="table table-striped table-bordered">
    <thead>
      <th>Username</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php foreach($this->users as $user){ ?>
      <tr>
        <td>
          <?php echo $user['username'] ?>
        </td>
        <td>
          <!-- dito link talaga sya tas lalagyan mo ng url parang sa action ng form, ipapasa mo yung id ng user -->
          <a href="<?php echo URL ?>user/edit/<?php echo $user['id'] ?>">edit</a> |
          <a href="<?php echo URL ?>user/delete/<?php echo $user['id'] ?>">delete</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>  
  </table>
</div>