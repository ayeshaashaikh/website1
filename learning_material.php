<?php
include "db.php"; // Include your database connection file
include "header.php"; // Include your header file if necessary
include "navigation.php"; // Include navigation bar

// Assuming these are the subjects and their units (you can fetch them from the database as well)
$subjects = [
    'Advanced Java' => [
        'Unit 1' => 'https://drive.google.com/file/d/1zb76zcuWFqxDGyWeDGr33WxJJz9Ubh4o/view?usp=drive_link',
        'Unit 2' => 'https://drive.google.com/file/d/1zhf1xxEuD3Xqv-9oLILKGfzZ-hxMKhOI/view?usp=drive_link', // Add URL for Unit 2
        'Unit 3' => 'https://drive.google.com/file/d/1zpTpSMtSQHE8GzIFx8mNzl6C_B6bH4GP/view?usp=drive_link', // Add URL for Unit 3
        'Unit 4' => 'https://drive.google.com/file/d/1zqF-8ZSKQTqulRSIsMwiGiXxv_T5R1ZG/view?usp=drive_link', // Add URL for Unit 4
        'Unit 5' => 'https://drive.google.com/file/d/1-AvO6x9Y6X8-8SnWRYn1hak1Tl99KCZv/view?usp=drive_link', // Add URL for Unit 5
        'Unit 6' => 'https://drive.google.com/file/d/1-D-ZB4NfQWMtVXOqnsgtcB2pL25xFQ_j/view?usp=drive_link'  // Add URL for Unit 6
    ],
    'Operating Systems' => [
        'Unit 1' => 'https://drive.google.com/file/d/1-ZBYjMcxl2uZ6ra_RM2RyRUvS06tjZxE/view?usp=drive_link', // Add URL for Unit 1 of Operating Systems
        'Unit 2' => 'https://drive.google.com/file/d/1-ZjZruI6vo44PkDo7IozPaSvI4__Ck1Y/view?usp=drive_link', // Add URL for Unit 2
        'Unit 3' => 'https://drive.google.com/file/d/1-iqV1WcZUGk8QcSDerir0fRY1nrZ1sY6/view?usp=drive_link', // Add URL for Unit 3
        'Unit 4' => 'https://drive.google.com/file/d/1-jRg78041wKRqLiuVfDpabAOmD9nXlUp/view?usp=drive_link', // Add URL for Unit 4
        'Unit 5' => 'https://drive.google.com/file/d/1-mXj52YpmH6k8Cul7PPrij7_lL1Pa0oD/view?usp=drive_link', // Add URL for Unit 5
        'Unit 6' => 'https://drive.google.com/file/d/1-n0gbp4vkkygF8lzgHFG_zhAax6gX8Ay/view?usp=drive_link'  // Add URL for Unit 6
    ],
    'Software Testing' => [
        'Unit 1' => 'https://drive.google.com/file/d/1GkXRr52P8_SugraOwjATgeklyQY4p5T7/view?usp=drive_link', // Add URL for Unit 1 of Software Testing
        'Unit 2' => 'https://drive.google.com/file/d/1VOuQ8r6HR00BHdkZ3eB7_rtD2a7lAQgf/view?usp=drive_link', // Add URL for Unit 2
        'Unit 3' => 'https://drive.google.com/file/d/1NgXzNb0V6aWL2uiA5HC29VWxs7Dlk60b/view?usp=drive_link', // Add URL for Unit 3
        'Unit 4' => 'https://drive.google.com/file/d/1JFY184F_Bn7dUbOc-2yKUdZmNTeXwF5d/view?usp=drive_link', // Add URL for Unit 4
        'Unit 5' => 'https://drive.google.com/file/d/15tJ_pJjipT3LaoKztlesKnMsXwr0UCq_/view?usp=drive_link', // Add URL for Unit 5
        'practical list' => 'https://drive.google.com/file/d/1yQuxFI8UMOxbmpETCByJ7Tx8eTwt_3fx/view?usp=drive_link'  // Add URL for Unit 6
    ],
    'Computer Networks' => [
        'Unit 1' => '#', // Add URL for Unit 1 of Computer Networks
        'Unit 2' => '#', // Add URL for Unit 2
        'Unit 3' => '#', // Add URL for Unit 3
        'Unit 4' => '#', // Add URL for Unit 4
        'Unit 5' => '#', // Add URL for Unit 5
        'Unit 6' => '#'  // Add URL for Unit 6
    ]
];

// Mapping of subjects to their respective logos
$subject_logos = [
    'Advanced Java' => 'adv.png',
    'Operating Systems' => 'os.png',
    'Software Testing' => 'sof.png',
    'Computer Networks' => 'networks_logo.png'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Materials</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .subject-box {
            width: 300px;
            padding: 20px;
            margin: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Added a slight shadow for depth */
            display: inline-block;
            vertical-align: top;
            background-color: #f9f9f9;
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition for hover effects */
            position: relative; /* Ensure position for the logo */
            text-align: center; /* Center align content */
        }

        .subject-box:hover {
            transform: translateY(-5px); /* Lift the box on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Increase shadow on hover for more depth */
        }

        .unit-link {
            display: block;
            margin-top: 10px;
            color: blue:
            text-decoration: none;
        }

        .unit-link:hover {
            text-decoration: underline;
        }

        .subject-logo {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 30px; /* Adjust size as needed */
            height: auto;
        }

        .subject-box ul {
            padding-left: 0; /* Remove default padding */
            margin-top: 5px; /* Adjust top margin for spacing */
        }

        .subject-box ul li {
            list-style-type: none; /* Remove bullet points */
            margin-bottom: 5px; /* Adjust margin between list items */
        }

        h3 {
            font-size: 24px;
           
            padding-bottom: 10px;
        }
        nav ul li a {
    text-decoration: none;
    color: white;
    transition: color 0.3s;
}
    </style>
</head>
<body>
    <div class="container">
        <h2>Learning Materials</h2>
        <div class="subject-container">
            <?php foreach ($subjects as $subject => $units): ?>
                <div class="subject-box">
                    <h3><?php echo $subject; ?></h3>
                    <img src="image/<?php echo $subject_logos[$subject]; ?>" alt="<?php echo $subject; ?> Logo" class="subject-logo">
                    <ul>
                        <?php foreach ($units as $unit => $link): ?>
                            <li><a href="<?php echo $link; ?>" class="unit-link"><?php echo $unit; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>

