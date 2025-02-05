<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luggage Information</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        } 
        body {
            font-family: Arial, sans-serif;
            background-color: #2c3e50; 
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #f39c12; 
        }

        p, #line1, #line2, table {
            color: #ecf0f1;
            font-size: 18px;
            padding-left: 100px;
            padding-right: 100px;
        }

        
        #image1 {
            display: block;
            margin: 20px auto;
            height: 375px;
            width: 650px;
        }

        
        #mainh1 {
            padding-top: 30px;
        }


        details {
            background-color: #34495e; 
            border: 1px solid #ecf0f1;
            padding: 15px;
            margin: 15px 100px;
            border-radius: 5px;
        }

        summary {
            font-size: 22px;
            font-weight: bold;
            color: #f39c12;
            cursor: pointer;
        }

       
        table {
            margin: 0 auto;
            margin-bottom: 20px;
            background-color: #34495e;
            border-collapse: collapse;
            width: 80%;
        }

        table, th, td {
            border: 1px solid #ecf0f1;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f39c12; 
            color: #2c3e50;
        }

        
        #para2 {
            color: #e74c3c;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include 'guestheader.php'; ?><br><br><br><br><br><br>
    <h1 id="mainh1"><b>Baggage Allowance</b></h1>
    <img src="images/dimage15.webp" id="image1" alt="luggage">

    <p>The following information will help you determine the number and weight of baggage pieces you can carry during your journey with Fly High Airways.</p>

    <!-- Baggage Allowance Section -->
    <details>
        <summary>Baggage Allowance</summary>
        <p>To make your journey smoother, we provide flexible luggage options to suit every type of traveler.</p>
        <ul id = "line1">
            <li id="line2"><b>Weight Limit:</b> Each checked bag can weigh up to 30 or 40 kg. Excess baggage fees will apply if your bag exceeds the allowed weight.</li>
            <li id="line2"><b>Dimensions:</b> The total dimensions (Length + Width + Height) of each checked bag should not exceed 158 cm/62 inches.</li>
        </ul>

        <table>
            <tr>
                <th>Cabin Class</th>
                <th>Maximum Weight</th>
                <th>Maximum Pieces</th>
            </tr>
            <tr>
                <td>Business</td>
                <td>40kg</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Economy</td>
                <td>30kg</td>
                <td>1</td>
            </tr>
        </table>

        <p>Please note that when a piece of baggage exceeds the total dimension of 158 cm (height + length + width), a charge of USD 50 per oversized bag will apply.</p>
    </details>

    <!-- Hand Luggage Section -->
    <details>
        <summary>Hand Luggage</summary>
        <p>We offer convenient hand luggage options to ensure you travel comfortably with your essential items.</p>
        <table>
            <tr>
                <th>Cabin Class</th>
                <th>Maximum Weight</th>
                <th>Maximum Pieces</th>
            </tr>
            <tr>
                <td>Business</td>
                <td>7kg</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Economy</td>
                <td>7kg</td>
                <td>1</td>
            </tr>
        </table>
        <p id="para2"><i>Each piece of hand baggage must weigh no more than 7 kg.</i></p>
        <p>You can also carry personal items such as a lady’s handbag, small briefcase, coat, umbrella, crutches, or limited reading material. Additionally, you may carry duty-free items purchased on the day of your flight.</p>
    </details>

    <!-- Baggage Charges Section -->
    <details>
        <summary>Baggage Charges</summary>
        <table>
            <tr>
                <th>Cabin Class</th>
                <th>Charges at the airport per KG in USD</th>
            </tr>
            <tr>
                <td>Business</td>
                <td>17 USD</td>
            </tr>
            <tr>
                <td>Economy</td>
                <td>17 USD</td>
            </tr>
        </table>
    </details>

    <!-- Additional Baggage Charges Section -->
    <details>
        <summary>Additional Baggage Charges</summary>
        <table>
            <tr>
                <th>Cabin Class</th>
                <th>Overweight Charge (Per 1kg)</th>
                <th>Extra Piece Charge</th>
                <th>Maximum Weight of Extra Piece</th>
            </tr>
            <tr>
                <td>Business</td>
                <td>25 USD</td>
                <td>270 USD</td>
                <td>30kg</td>
            </tr>
            <tr>
                <td>Economy</td>
                <td>25 USD</td>
                <td>270 USD</td>
                <td>30kg</td>
            </tr>
        </table>
    </details>

    <!-- Rules and Regulations Section -->
    <details>
        <summary>Rules and Regulations</summary>
        <ul id = "line1">
            <li id="line2"><b>Dangerous Goods:</b> Passengers are strictly prohibited from carrying hazardous items such as explosives, flammable liquids, and gases in checked or carry-on luggage.</li>
            <li id="line2"><b>Liquids:</b> In carry-on luggage, liquids must be in containers of 100ml or less and fit into a single transparent, resealable plastic bag (no larger than 1 liter).</li>
            <li id="line2"><b>Weapons:</b> Firearms, knives, and any objects that could be used as weapons are prohibited without prior authorization and documentation.</li>
            <li id="line2"><b>Sports Equipment:</b> Items like bicycles, skis, and surfboards can be transported but must be properly packed. Special handling fees may apply.</li>
            <li id="line2"><b>Musical Instruments:</b> Small instruments may be carried in the cabin if they meet size and weight restrictions. Larger instruments must be checked as special baggage.</li>
            <li id="line2"><b>Valuable Items:</b> It is recommended to carry valuable or fragile items such as electronics and jewelry in hand luggage.</li>
            <li id="line2"><b>Lost Baggage:</b> Report any lost baggage to the service desk immediately for assistance.</li>
            <li id="line2"><b>Damaged Baggage:</b> Claims must be made within 4 days if your baggage is damaged during transit.</li>
        </ul>
    </details>
    <?php include 'guestfooter.php'; ?>
</body>
</html>
