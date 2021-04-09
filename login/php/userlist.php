<html>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
            align: right;
        }
        .center {
            margin-left: auto;
            margin-right: auto;
        }
        th {
            background-color: #588c7e;
            color: white;
        }
        tr:nth-child(even) {background-color: #f2f2f2}
    </style>
    <head>
        <link rel="stylesheet" href="../dstyle.css" />
    </head>   
    <header class="page-header">
        <nav>
        <a href="#0" aria-label="forecastr logo" class="logo">
            <svg width="140" height="49">
            <use xlink:href="#logo"></use>
            </svg>
        </a>
        <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu">
            <svg width="20" height="20" aria-hidden="true">
            <use xlink:href="#down"></use>
            </svg>
        </button>
        <ul class="admin-menu">
            <li class="menu-heading">
            <h3>Admin</h3>
            </li>
            <li>
            <a href="#0">
                <svg>
                <use xlink:href="#users"></use>
                </svg>
                <span>Users</span>
            </a>
            </li>
            <li>
            <a href="adduser.html">
                <svg>
                <use xlink:href="#adduser"></use>
                </svg>
                <span>Add User</span>
            </a>
            </li>
            <li>
            <a href="#0">
                <svg>
                <use xlink:href="#trends"></use>
                </svg>
                <span>Trends</span>
            </a>
            </li>
            <li>
            <a href="#0">
                <svg>
                <use xlink:href="#collection"></use>
                </svg>
                <span>Collection</span>
            </a>
            </li>
            <li>
            <a href="#0">
                <svg>
                <use xlink:href="#comments"></use>
                </svg>
                <span>Comments</span>
            </a>
            </li>
            <li>
            <a href="#0">
                <svg>
                <use xlink:href="#appearance"></use>
                </svg>
                <span>Appearance</span>
            </a>
            </li>
            <li class="menu-heading">
            <h3>Settings</h3>
            </li>
            <li>
            <a href="#0">
                <svg>
                <use xlink:href="#settings"></use>
                </svg>
                <span>Settings</span>
            </a>
            </li>
            <li>
            <a href="#0">
                <svg>
                <use xlink:href="#options"></use>
                </svg>
                <span>Options</span>
            </a>
            </li>
            <li>
            <a href="#0">
                <svg>
                <use xlink:href="#charts"></use>
                </svg>
                <span>Charts</span>
            </a>
            </li>
            <li>
            <div class="switch">
                <input type="checkbox" id="mode" checked>
                <label for="mode">
                <span></span>
                <span>Dark</span>
                </label>
            </div>
            <button class="collapse-btn" aria-expanded="true" aria-label="collapse menu">
                <svg aria-hidden="true">
                <use xlink:href="#collapse"></use>
                </svg>
                <span>Collapse</span>
            </button>
            </li>
        </ul>
        </nav>
    </header>
    <body>
    <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                        <th>Name</th>
                        <th>Place</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $conn = mysqli_connect("localhost", "root", "", "bio");
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT name,place FROM users";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["name"]. "</td><td>" . $row["place"] . "</td><td>";
                        }
                        echo "</table>";
                        } else { echo "0 results"; }
                        $conn->close();
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
    </div>
    </body>
    
</html>

