<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Membership Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Casino System</a>
  </div>
</nav>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Membership Form</h4>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label>ID No.</label>
                        <input type="text" class="form-control" name="id_no" required>
                    </div>
                    <div class="col">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_name" required>
                    </div>
                    <div class="col">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middle_name">
                    </div>
                    <div class="col">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Alternative Name (Social Media)</label>
                    <input type="text" class="form-control" name="alt_name">
                </div>

                <div class="mb-3">
                    <label>Present Address</label>
                    <input type="text" class="form-control" name="present_address" required>
                </div>

                <div class="mb-3">
                    <label>Permanent Address</label>
                    <input type="text" class="form-control" name="permanent_address" required>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label>Birthdate</label>
                        <input type="date" class="form-control" name="birthdate" required>
                    </div>
                    <div class="col">
                        <label>Birthplace</label>
                        <input type="text" class="form-control" name="birthplace" required>
                    </div>
                    <div class="col">
                        <label>Civil Status</label>
                        <input type="text" class="form-control" name="civil_status" required>
                    </div>
                    <div class="col">
                        <label>Nationality</label>
                        <input type="text" class="form-control" name="nationality" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="col">
                        <label>Mobile No.</label>
                        <input type="text" class="form-control" name="mobile_no" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Source of Fund</label><br>
                    <input type="checkbox" name="source_of_fund_self"> Self-Employed/Business<br>
                    <input type="checkbox" name="source_of_fund_employed"> Employed
                </div>

                <div class="mb-3">
                    <h5>Business Details</h5>
                    <input type="text" class="form-control mb-2" name="business_name" placeholder="Business Name">
                    <input type="text" class="form-control mb-2" name="business_nature" placeholder="Nature of Business">
                    <input type="text" class="form-control" name="id_presented" placeholder="ID Presented">
                </div>

                <div class="mb-3">
                    <h5>Employment Details</h5>
                    <input type="text" class="form-control mb-2" name="employer_name" placeholder="Employer Name">
                    <input type="text" class="form-control" name="nature_of_work" placeholder="Nature of Work">
                </div>

                <div class="mb-3">
                    <label>Politically Exposed?</label><br>
                    <input type="checkbox" name="is_exposed"> Yes
                    <input type="text" class="form-control mt-2" name="relationship" placeholder="Relationship if yes">
                </div>

                <div class="mb-3">
                    <h5>Emergency Contact</h5>
                    <input type="text" class="form-control mb-2" name="emergency_name" placeholder="Name">
                    <input type="text" class="form-control mb-2" name="emergency_relationship" placeholder="Relationship">
                    <input type="text" class="form-control" name="emergency_contact_number" placeholder="Contact Number">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
