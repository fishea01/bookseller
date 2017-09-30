<?php include 'header.php'; ?>


<div class="from-group center">
    <h2>Sell Book</h2>

    <div class="container">

        <br>
        <label>Title</label>
        <input type="text" placeholder="Book Title" name="bookTitle" required>

        <br><br>
        <label>ISBN</label>
        <input type="text" placeholder="Enter ISBN" name="ISBN" required>

        <br><br>
        <label>Enter Price</label>
        <input type="text" placeholder="0.00" name="price" required>

        <br><br>
        <label>Quality of Book</label>
        <input type="text" placeholder="Enter Quality" name="quality" required>

        <br><br>
        <label>&nbsp;</label>
        <div>
            <button type="submit">Sell</button>
            <button type="cancel">Cancel</button>
        </div>
        <br/><br/>
    </div>

</div>
</body>
</html>