<?php
//include header file
include('include/header.php');
if (isset($_POST['submit'])) {

	//Term Input Check
	if (isset($_POST['term']) === true && isset($_POST['disease']) === true) {


		//Name Input Check
		if (isset($_POST['name']) && !empty($_POST['name'])) {

			if (preg_match('/^[A-Za-z\s]+$/', $_POST['name'])) {

				$name = $_POST['name'];
			} else {

				$nameError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Only lower and upper case and space characters are allowed.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times; </span>
				</button>
				</div>';
			}
		} else {

			$nameError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please fill the name fields.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times; </span>
			</button>
			</div>';
		}


		//Gender Input Check
		if (isset($_POST['gender']) && !empty($_POST['gender'])) {

			$gender = $_POST['gender'];
		} else {

			$genderError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please select your gender.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times; </span>
			</button>
			</div>';
		}


		//Date Input Check
		if (isset($_POST['day']) && !empty($_POST['day'])) {

			$day = $_POST['day'];
		} else {

			$dayError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please select day input.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times; </span>
			</button>
			</div>';
		}


		//Month Input Check
		if (isset($_POST['month']) && !empty($_POST['month'])) {

			$month = $_POST['month'];
		} else {

			$monthError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please select month input.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times; </span>
			</button>
			</div>';
		}


		//Year Input Check
		if (isset($_POST['year']) && !empty($_POST['year'])) {

			$year = $_POST['year'];
		} else {

			$yearError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please select year input.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times; </span>
			</button>
			</div>';
		}


		//Blood Group Input Check
		if (isset($_POST['blood_group']) && !empty($_POST['blood_group'])) {

			$blood_group = $_POST['blood_group'];
		} else {

			$blood_groupError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please select blood group.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times; </span>
			</button>
			</div>';
		}


		//City Input Check
		if (isset($_POST['city']) && !empty($_POST['city'])) {

			if (preg_match('/^[A-Za-z\s]+$/', $_POST['city'])) {

				$city = $_POST['city'];
			} else {

				$cityError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Only lower and upper case and space characters are allowed.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times; </span>
				</button>
				</div>';
			}
		} else {

			$cityError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please fill the city field.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times; </span>
			</button>
			</div>';
		}


		//Contact No Input Check
		if (isset($_POST['contact_no']) && !empty($_POST['contact_no'])) {

			if (preg_match('/\d{10}/', $_POST['contact_no'])) {

				$contact = $_POST['contact_no'];
			} else {

				$contact_noError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Contact should consist of 10 characters.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times; </span>
				</button>
				</div>';
			}
		} else {

			$contact_noError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please fill the contact field.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times; </span>
			</button>
			</div>';
		}



		//Password Input Check
		if (isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['c_password']) && !empty($_POST['c_password'])) {

			if (strlen($_POST['password']) >= 6) {

				if ($_POST['password'] == $_POST['c_password']) {

					$password = $_POST['password'];
				} else {

					$passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>The passwords are not same.</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times; </span>
					</button>
					</div>';
				}
			} else {

				$passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>The password consist of 6 characters.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times; </span>
				</button>
				</div>';
			}
		} else {

			$passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Please fill password field.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times; </span>
				</button>
				</div>';
		}

		//Email Input Check	
		// [a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}
		//[_a-z8-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})

		if (isset($_POST['email']) && !empty($_POST['email'])) {

			$pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

			if (preg_match($pattern, $_POST['email'])) {

				$check_email = $_POST['email'];

				$sql = "SELECT email FROM donor WHERE email='$check_email'";

				$result = mysqli_query($connection, $sql);

				if (mysqli_num_rows($result) > 0) {

					$emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Sorry this email is already registered.</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times; </span>
					</button>
					</div>';
				} else {

					$email = $_POST['email'];
				}
			} else {

				$emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Please enter valid email address.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times; </span>
				</button>
				</div>';
			}
		} else {

			$emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please fill the email field.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times; </span>
			</button>
			</div>';
		}

		//Insert Data Into DataBase

		if (isset($name) && isset($blood_group) && isset($gender) && isset($day) && isset($month) && isset($year) && isset($email) && isset($contact) && isset($city) && isset($password)) {

			$DonorDOB = $year . "-" . $month . "-" . $day;

			$password = md5($password);

			$sql = "INSERT INTO donor ( name , gender, email, city, dob, contact_no, save_life_date, password,blood_group) VALUES ('$name', '$gender', '$email', '$city', '$DonorDOB', '$contact', '0', '$password','$blood_group')";

			if (mysqli_query($connection, $sql)) {

				// $submitSuccess = '<div class="alert alert-success alert-dismissible fadeshow" role="alert">
				// <strong>Data inserted successfully.</strong>
				// <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				// <span aria-hidden="true">&times; </span>
				// </button>
				// </div>';

				header("Location: signin.php");
			} else {

				$submitError = '<div class="alert alert-danger alert-dismissible fade show"role="alert">
				<strong>Data not inserted!!Try again.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times; </span>
				</button>
				</div>';
			}
		}
	} else {

		$termError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Please agree with our terms and conditions.</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times; </span>
		</button>
		</div>';
	}
}

?>

<style>
	.size {
		min-height: 0px;
		padding: 60px 0 40px 0;

	}

	.form-container {
		background-color: white;
		border: .5px solid #eee;
		border-radius: 5px;
		padding: 20px 10px 20px 30px;
		-webkit-box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
		-moz-box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
		box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
	}

	.form-group {
		text-align: left;
	}

	h1 {
		color: white;
	}

	h3 {
		color: #e74c3c;
		text-align: center;
	}

	.red-bar {
		width: 25%;
	}
</style>
<div class="container-fluid red-background size">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h1 class="text-center">Donate</h1>
			<hr class="white-bar">
		</div>
	</div>
</div>
<div class="container size">
	<div class="row">
		<div class="col-md-6 offset-md-3 form-container">
			<h3>SignUp</h3>
			<hr class="red-bar">

			<?php if (isset($termError)) echo $termError;
			if (isset($submitSuccess))  echo $submitSuccess;
			if (isset($submitError))  echo $submitError;
			?>

			<!-- Error Messages -->

			<form class="form-group" action="" method="post" novalidate="">
				<div class="form-group">
					<label for="fullname">Full Name</label>
					<input type="text" name="name" id="fullname" placeholder="Full Name" required pattern="[A-Za-z/\s]+" title="Only lower and upper case and space" class="form-control" value="<?php if (isset($name)) echo $name;  ?>">
					<?php if (isset($nameError)) echo $nameError;  ?>
				</div><!--full name-->
				<div class="form-group">
					<label for="name">Blood Group</label><br>
					<select class="form-control demo-default" id="blood_group" name="blood_group" required>
						<option value="">---Select Your Blood Group---</option>
						<?php if (isset($blood_group)) echo '<option selected="" value="' . $blood_group . '">' . $blood_group . '</option>';   ?>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="O+">O+</option>
						<option value="O-">O+</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
					</select>
					<?php if (isset($blood_groupError)) echo $blood_groupError;  ?>
				</div>
				<div class="form-inline">
					<p name="assure" value="true" style="margin-left:10px;">
						<span style="margin-left:1px;"><b>*If you have any tattoos OR any past diseases, PLEASE contact us. </b></span>
					</p>
				</div><!--End form-group-->

				<div class="form-group">
					<label for="gender">Gender</label><br>
					Male<input type="radio" name="gender" id="gender" value="Male" style="margin-left:10px; margin-right:10px;" checked>
					Female<input type="radio" name="gender" id="gender" value="Female" style="margin-left:10px;" <?php if (isset($gender)) {
																														if ($gender == "female") echo "checked ";
																													} ?>>
					<?php if (isset($genderError)) echo $genderError;  ?>
				</div><!--gender-->

				<div class="form-inline">
					<label for="name">Date of Birth</label><br>
					<select class="form-control demo-default" id="date" name="day" style="margin-bottom:10px;" required>
						<option value="">---Date---</option>
						<?php if (isset($day)) echo '<option selected="" value="' . $day . '">' . $day . '</option>';   ?>
						<option value="01">01</option>
						<option value="02">02</option>
						<option value="03">03</option>
						<option value="04">04</option>
						<option value="05">05</option>
						<option value="06">06</option>
						<option value="07">07</option>
						<option value="08">08</option>
						<option value="09">09</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>
					<select class="form-control demo-default" name="month" id="month" style="margin-bottom:10px;" required>
						<option value="">---Month---</option>
						<?php if (isset($month)) echo '<option selected="" value="' . $month . '">' . $month . '</option>';   ?>
						<option value="01">January</option>
						<option value="02">February</option>
						<option value="03">March</option>
						<option value="04">April</option>
						<option value="05">May</option>
						<option value="06">June</option>
						<option value="07">July</option>
						<option value="08">August</option>
						<option value="09">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>
					<select class="form-control demo-default" id="year" name="year" style="margin-bottom:10px;" required>
						<option value="">---Year---</option>
						<?php if (isset($year)) echo '<option selected="" value="' . $year . '">' . $year . '</option>';   ?>
						<option value="1978">1978</option>
						<option value="1979">1979</option>
						<option value="1980">1980</option>
						<option value="1981">1981</option>
						<option value="1982">1982</option>
						<option value="1983">1983</option>
						<option value="1984">1984</option>
						<option value="1985">1985</option>
						<option value="1986">1986</option>
						<option value="1987">1987</option>
						<option value="1988">1988</option>
						<option value="1989">1989</option>
						<option value="1990">1990</option>
						<option value="1991">1991</option>
						<option value="1992">1992</option>
						<option value="1993">1993</option>
						<option value="1994">1994</option>
						<option value="1995">1995</option>
						<option value="1996">1996</option>
						<option value="1997">1997</option>
						<option value="1998">1998</option>
						<option value="1999">1999</option>
						<option value="2000">2000</option>
						<option value="2001">2001</option>
						<option value="2002">2002</option>
						<option value="2002">2002</option>
						<option value="2003">2003</option>
						<option value="2004">2004</option>
						<option value="2005">2005</option>
						<option value="2006">2006</option>
						<option value="2007">2007</option>
					</select>
				</div><!--End form-group-->
				<?php if (isset($dayError)) echo $dayError;  ?>
				<?php if (isset($monthError)) echo $monthError;  ?>
				<?php if (isset($yearError)) echo $yearError;  ?>


				<div class="form-group">
					<label for="fullname">Email</label>
					<input type="text" name="email" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please write correct email" class="form-control" value="<?php if (isset($email)) echo $email;  ?>">
					<?php if (isset($emailError)) echo $emailError;  ?>
				</div>

				<div class="form-group">
					<label for="contact_no">Contact No</label>
					<input type="text" name="contact_no" placeholder="91********" class="form-control" required pattern="^\d{10}$" title="10 numeric characters only" maxlength="10" value="<?php if (isset($contact)) echo $contact;  ?>">
					<?php if (isset($contact_noError)) echo $contact_noError;  ?>
				</div><!--End form-group-->

				<div class="form-group">
					<label for="city">City</label>
					<select name="city" id="city" class="form-control demo-default" required>
						<option value="">-- Select --</option><?php if (isset($city)) echo '<option selected="" value="' . $city . '">' . $city . '</option>';   ?>
						<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
						<option value="Andhra Pradesh">Andhra Pradesh</option>
						<option value="Arunachal Pradesh">Arunachal Pradesh</option>
						<option value="Assam">Assam</option>
						<option value="Bihar">Bihar</option>
						<option value="Chandigarh">Chandigarh</option>
						<option value="Chhattisgarh">Chhattisgarh</option>
						<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
						<option value="Daman and Diu">Daman and Diu</option>
						<option value="Delhi">Delhi</option>
						<option value="Goa">Goa</option>
						<option value="Gujarat">Gujarat</option>
						<option value="Haryana">Haryana</option>
						<option value="Himachal Pradesh">Himachal Pradesh</option>
						<option value="Jammu and Kashmir">Jammu and Kashmir</option>
						<option value="Jharkhand">Jharkhand</option>
						<option value="Karnataka">Karnataka</option>
						<option value="Kerala">Kerala</option>
						<option value="Ladakh">Ladakh</option>
						<option value="Lakshadweep">Lakshadweep</option>
						<option value="Madhya Pradesh">Madhya Pradesh</option>
						<option value="Maharashtra">Maharashtra</option>
						<option value="Manipur">Manipur</option>
						<option value="Meghalaya">Meghalaya</option>
						<option value="Mizoram">Mizoram</option>
						<option value="Nagaland">Nagaland</option>
						<option value="Odisha">Odisha</option>
						<option value="Puducherry">Puducherry</option>
						<option value="Punjab">Punjab</option>
						<option value="Rajasthan">Rajasthan</option>
						<option value="Sikkim">Sikkim</option>
						<option value="Tamil Nadu">Tamil Nadu</option>
					</select>
					<?php if (isset($cityError)) echo $cityError;  ?>
				</div><!--city end-->

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" value="" placeholder="Password" class="form-control" required pattern=".{6,}">
				</div><!--End form-group-->
				<div class="form-group">
					<label for="password">Confirm Password</label>
					<input type="password" name="c_password" value="" placeholder="Confirm Password" class="form-control" required pattern=".{6,}">
					<?php if (isset($passwordError)) echo $passwordError;  ?>
				</div><!--End form-group-->

				<div class="form-inline">
					<input type="checkbox" name="disease" value="true" required style="margin-left:10px;">
					<span style="margin-left:10px;"><b>I assure that I am free of all diseases and I am eligible to donate blood.</b></span>
				</div>

				<div class="form-inline">
					<input type="checkbox" checked="" name="term" value="true" required style="margin-left:10px;">
					<span style="margin-left:10px;"><b>I agree to donate my blood and show my Name, Contact Nos. and E-Mail in Blood donors List</b></span>
				</div>

				<!--End form-group-->

				<div class="form-group">
					<button id="submit" name="submit" type="submit" class="btn btn-lg btn-danger center-aligned" style="margin-top: 20px;">SignUp</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
//include footer file
include('include/footer.php');
?>