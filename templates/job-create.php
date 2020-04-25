<?php include 'inc/header.php'; ?>
  <h2 class="page-header">Create Job Listing</h2>
  <form action="post" action="create.php">

    <div class="form-group">
      <label>Category</label>
      <select name="category" class="form-control">
        <option value="0">Choose Category</option>
        <?php foreach($categories as $category): ?>
          <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="form-group">
      <label>Company</label>
      <input type="text" class="form-control" name="company" placeholder="Insert Company Name">
    </div>
    
    <div class="form-group">
      <label>Job Title</label>
      <input type="text" class="form-control" name="job_title" placeholder="Insert Job Title">
    </div>
    
    <div class="form-group">
      <label>Job Description</label>
      <textarea name="description" class="form-control" placeholder="Insert Job Description"></textarea>
    </div>
    
    <div class="form-group">
      <label>Salary</label>
      <input type="text" class="form-control" name="salary" placeholder="Insert Salary">
    </div>
    
    <div class="form-group">
      <label>Location</label>
      <input type="text" class="form-control" name="location" placeholder="Insert Job Location">
    </div>
    
    <div class="form-group">
      <label>Contact User</label>
      <input type="text" class="form-control" name="contact_user" placeholder="Insert Contact Name">
    </div>

    <div class="form-group">
      <label>Contact Email</label>
      <input type="email" class="form-control" name="contact_email" placeholder="Insert Contact E-Mail">
    </div>

    <input type="submit" class="btn btn-light" value="Submit" name="submit">
  </form>
<?php include 'inc/footer.php'; ?>