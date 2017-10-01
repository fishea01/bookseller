<?php include 'header.php'; ?>

<div class="container">
    <div class="panel panel-default">
        <h2>Book Search</h2>
        <!--Search in the header-->
        <div class="panel-heading text-center clearfix">

            <div class="pull-right">
                
                <form class="form-inline input-group">
                    <div class="form-group">
                        <input type="text" class="form-control" id="searchFor" placeholder="Book / ISBN ">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="location" placeholder="Location">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            </div>
        </div>
        <div class="panel-body">

            <!--TODO: Sorting????--> 
            <table class="table table-striped table-hover">
                <thead>
                    <th>Book Title</th>
                    <th>ISBN</th>
                    <th>Price</th>
                    <th>Quality</th>
                    <th>Location</th>
                </thead>
                <tbody>

                    <!--TODO: PHP Loop to create table entries dynamically based on results-->
                    <tr>
                        <td>Book Title 1</td>
                        <td>000000000000</td>
                        <td>$0.00</td>
                        <td>Like New</td>
                        <td>Franklin University</td>       
                    </tr>
                    <tr>
                        <td>Book Title 2</td>
                        <td>000000000000</td>
                        <td>$0.00</td>
                        <td>Good</td>
                        <td>Franklin University</td>       
                    </tr>
                    <tr>
                        <td>Book Title 3</td>
                        <td>000000000000</td>
                        <td>$0.00</td>
                        <td>Bad</td>
                        <td>Franklin University</td>       
                    </tr>
                    <tr>
                        <td>Book Title 4</td>
                        <td>000000000000</td>
                        <td>$0.00</td>
                        <td>Bad</td>
                        <td>Franklin University</td>       
                    </tr>
                    
                </tbody>
                
            </table>

        </div>

        <!--TODO: Search results maybe?--> 
        <div class="panel-footer text-center">
            <p>4 records found</p>
        </div>


    </div>
</div>

</body>
</html>