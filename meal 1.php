<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In-flight Meals</title>
    <style>
        
        body {
            background-color: white; 
            color: #B0C4DE; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        
        #mainh1 {
            text-align: center;
            font-style: italic;
            padding: 30px;
            color: #FFF;
        }

        
        #mainh2 {
            text-align: center;
            color: #FFF;
            font-weight: bold;
            text-decoration: underline;
            margin: 20px 0;
        }

        
        #para1 {
            font-size: 18px;
            line-height: 1.8;
            padding: 10px 150px;
            color: white;
        }
		 #para2 {
            font-size: 18px;
            line-height: 1.8;
            padding: 20px 150px;
            color: white;
        }

        
        #image1 {
            display: block;
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
            height: auto;
        }

        
        #image2 {
            width: 250px;
            height: 200px;
            margin: 20px;
            border-radius: 8px;
            border: 2px solid #CCC;
        }

        
        #row1 {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }

        
        #mainh3 {
            text-align: center;
            color: black;
        }

        
        details {
            margin: 20px 150px;
            background-color: #1F2B3A;
            color:  #B0C4DE;
            padding: 20px;
            border-radius: 10px;
            cursor: pointer;
        }

        summary {
            font-weight: bold;
            color: white  ;
        }

        
        #background1 {
            background-color: #1F2B3A;
            padding: 20px 0;
        }

        
        @media (max-width: 768px) {
            #para1 {
                padding: 20px;
            }
            #image1, #image2 {
                width: 100%;
                height: auto;
            }
            #row1 {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
<?php include 'guestheader.php'; ?><br><br><br><br>
    <div id="background1">
        <h1 id="mainh1">Your desired flavors are now above the clouds</h1>
        <img src="images/dimage13.jpg" id="image1" alt="Meals">
        <h2 id="mainh2">Order your meal with us</h2>
    </div>

    <p id="para2">
        <b><i>
            At FLYHIGH Airline, we believe that your journey should be as enjoyable as your destination. Our thoughtfully crafted in-flight meal options cater to a variety of tastes prepared with care. Whether you're indulging in a light snack or savoring a full-course meal, our selections are designed to enhance your travel experience with delicious and nutritious choices.
        </b></i>
    </p>

    <details>
        <summary>Economy Class Meals</summary>
        <p id="para1">
            Economy class flight meals typically include a simple main dish like pasta, chicken with rice, or a vegetarian option, along with a side salad or bread roll, a small dessert, and a choice of beverages such as water, juice, tea, or coffee. Meals are served in disposable packaging and designed for easy in-flight consumption.
        </p>
    </details>

    <div id="row1">
        <div>
            <h3 id="mainh3">Meal Type 01</h3>
            <img src="images/dimage4.webp" id="image2" alt="Meal Type 01">
        </div>
        <div>
            <h3 id="mainh3">Meal Type 02</h3>
            <img src="images/dimage5.jpg" id="image2" alt="Meal Type 02">
        </div>
        <div>
            <h3 id="mainh3">Meal Type 03</h3>
            <img src="images/dimage6.jpg" id="image2" alt="Meal Type 03">
        </div>
    </div>

    <details>
        <summary>Business Class Meals</summary>
        <p id="para1">
            Business class flight meals are more upscale and diverse, often featuring gourmet dishes with a choice of appetizers, main courses such as grilled meats or seafood, and a selection of fine desserts. Meals are typically served on real tableware with linen napkins and may include premium beverages like wine, champagne, and specialty coffee.
        </p>
    </details>

    <div id="row1">
        <div>
            <h3 id="mainh3">Meal Type 04</h3>
            <img src="images/dimage1.webp" id="image2" alt="Meal Type 04">
        </div>
        <div>
            <h3 id="mainh3">Meal Type 05</h3>
            <img src="images/dimage2.jpg" id="image2" alt="Meal Type 05">
        </div>
        <div>
            <h3 id="mainh3">Meal Type 06</h3>
            <img src="images/dimage3.webp" id="image2" alt="Meal Type 06">
        </div>
    </div>

    <details>
        <summary>Special Meals</summary>
        <p id="para1">
            Special meals for flight passengers are tailored to accommodate dietary restrictions, religious practices, or personal preferences. These include options like vegetarian, vegan, gluten-free, diabetic, kosher, halal, and low-sodium meals. Passengers usually need to request these meals in advance to ensure availability.
        </p>
    </details>

    <div id="row1">
        <div>
            <h3 id="mainh3">Meal Type 07</h3>
            <img src="images/dimage7.jpg" id="image2" alt="Meal Type 07">
        </div>
        <div>
            <h3 id="mainh3">Meal Type 08</h3>
            <img src="images/dimage8.jpg" id="image2" alt="Meal Type 08">
        </div>
        <div>
            <h3 id="mainh3">Meal Type 09</h3>
            <img src="images/dimage9.jpg" id="image2" alt="Meal Type 09">
        </div>
    </div>
    <?php include 'guestfooter.php'; ?>
</body>
</html>
