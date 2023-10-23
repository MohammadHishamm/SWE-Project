<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/edit-page.css" />
  </head>
  <body style="background-color: #ebeff4">
    <div class="wrapper bg-white mt-sm-5">
      <h4 class="pb-4 border-bottom">Account settings</h4>
      <div class="d-flex align-items-start py-3 border-bottom">
        <img
          style="margin: 10px"
          src="https://images.pexels.com/photos/1037995/pexels-photo-1037995.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
          class="img"
          alt=""
        />
        <div class="pl-sm-4 pl-2" id="img-section">
          <b>Profile Photo</b>
          <p>Accepted file type .png. Less than 1MB</p>
          <button style="margin: 10px" class="btn button border">
            <b>Upload</b>
          </button>
        </div>
      </div>
      <div class="py-2">
        <div class="row py-2">
          <div class="col-md-6">
            <label for="firstname">First Name</label>
            <input
              type="text"
              class="bg-light form-control"
              placeholder="Steve"
            />
          </div>
          <div class="col-md-6 pt-md-0 pt-3">
            <label for="lastname">Last Name</label>
            <input
              type="text"
              class="bg-light form-control"
              placeholder="Smith"
            />
          </div>
        </div>
        <div class="row py-2">
          <div class="col-md-6">
            <label for="email">Email Address</label>
            <input
              type="text"
              class="bg-light form-control"
              placeholder="steve_@email.com"
            />
          </div>
          <div class="col-md-6 pt-md-0 pt-3">
            <label for="phone">Phone Number</label>
            <input
              type="tel"
              class="bg-light form-control"
              placeholder="+1 213-548-6015"
            />
          </div>
        </div>
        <div class="row py-2">
          <div class="col-md-6">
            <label for="country">Country</label>
            <select name="country" id="country" class="bg-light">
              <option value="india">India</option>
              <option value="usa" selected>USA</option>
              <option value="uk">UK</option>
              <option value="uae">UAE</option>
            </select>
          </div>
        </div>
        <div class="py-3 pb-4 border-bottom">
          <button class="btn btn-primary mr-3">Save Changes</button>
          <button class="btn border button">Cancel</button>
        </div>
        <div class="d-sm-flex align-items-center pt-3" id="deactivate">
          <div>
            <b>Delete your account</b>
            <p>Details about your company account and password</p>
          </div>
          <div class="ml-auto">
            <button style="margin: 10px" class="btn danger">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>