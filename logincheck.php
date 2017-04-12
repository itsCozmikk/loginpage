if (isset($_POST["login"])) {
		if ($_POST["username"] != "" &amp;&amp; $_POST["password"] != "") {

			// open users.txt for reading
			$file = fopen("users.txt", "r");

			while (!feof($file)) {


					$data = explode (":", fgets($file));

					if ($data[1] == $_POST["username"] &amp;&amp; $data[2] == $_POST["password"]) {

						$login = true;
						$_SESSION["login"] = $login;
						$_SESSION["username"] = $_POST["username"];

						//$_SESSION['type'] = $data[3];
						echo "Thank you for logging in, in 5 seconds you will be taken to the homepage.";
						echo "&lt;br&gt;";
						echo '&lt;br&gt;If you do not wish to wait, &lt;a href="home.php">Click&lt;/a&gt;';
						header("refresh: 5; home.php");
					}
					else {
						$login = false;
						echo "Incorrect login.";
						echo "&lt;br&gt;Your username should be your First Name.";
						echo "&lt;br&gt;Your password should be your Email.";
						echo "&lt;br&gt;";
						echo '&lt;br&gt;Or perhaps you havent registered yet? &lt;a href="register.php">Register&lt;/a&gt;';
					}
				}
				break;
			}
			fclose($file);
		}
		else {
			$login = false;
			echo "Incorrect login.";
			echo "&lt;br&gt;Your username should be your First Name.";
			echo "&lt;br&gt;Your password should be your Email.";
			echo "&lt;br&gt;";
			echo '&lt;br&gt;Or perhaps you havent registered yet? &lt;a href="register.php">Register&lt;/a&gt;';
		}
	}
