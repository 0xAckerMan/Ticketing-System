<div class="main">
<div class="navbar">
            <div class="nav-right">
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./contacts.php">Contacts</a></li>
                    <li><a href="./create.php">Create</a></li>
                </ul>
            </div>
        </div>

    <div class="container-one">
        <form action="insert.php" method="post">
            <label for="first-name">Title:</label>
            <input type="text" id="first-name" name="first_name" required>
            <label for="last-name">Message:</label>
            <input type="text" id="last-name" name="last_name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone_number" required>
            <label for="address">Address:</label>
            <input id="address" name="address" required></input>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>
            <input type="submit" value="Submit" name="btnadd">
        </form>

