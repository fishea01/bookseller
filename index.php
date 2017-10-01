
<?php include 'header.php'; ?>

<div class="container">
    <div class="panel panel-default">

        <!--Search in the header-->
        <div class="panel-heading text-center clearfix">

            <div class="pull-left">
                <h3>Most Recent Additions</h3>
            </div>
        </div>

        <div class="panel-body">


            <div class="container">
                <!-- TODO: If book is listed by logged in user then show the remove button otherwise do not-->
                <div class="row">
                    <div class="col-md-3"><a href="#">Book Title 1</a></div>
                    <div class="col-md-3">$0.00</div>
                    <div class="col-md-3"><a href="#"><i class="glyphicon glyphicon-remove"></i></a></div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#mark1Sold">Mark as Sold</button>
                    </div>
                </div>

                <!--The collapsible div under the book--> 
                <div id="mark1Sold" class="collapse">

                    <form>

                        <div class="row">
                            <div class="col-md-offset-1 col-md-9"><hr></div>
                        </div>
                        <!--Top row of the collapsible--> 

                        <div class="row clearfix">

                            <div class="col-md-offset-1 col-md-4">
                                <div class="form-inline">
                                    <label for="buyerEmail">Buyers Email:</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                            </div>
                            <div class="col-md-offset-1 col-md-2">
                                <div class="form-group">

                                    <i class="glyphicon glyphicon glyphicon-star"></i>
                                    <i class="glyphicon glyphicon glyphicon-star"></i>
                                    <i class="glyphicon glyphicon glyphicon-star-empty"></i>
                                    <i class="glyphicon glyphicon glyphicon-star-empty"></i>
                                    <i class="glyphicon glyphicon glyphicon-star-empty"></i>
                                </div>
                            </div>
                            <div clas="col-md-offset-2 col-md-2">
                                <div class="form-group">

                                    <button type="button" class="btn btn-default">Submit</button>
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>
                            </div>


                        </div>

                        <!--Bottom row of the collapsible--> 
                        <div class="row">
                            <div class="col-md-offset-1 col-md-9">
                                <div class="form-group">
                                    <label for="comment">Comment:</label>
                                    <textarea class="form-control" rows="4" id="comment"></textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-inline">
                                    <label>&nbsp;</label>

                                </div> 
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12"><hr></div>
            </div>

            <div class="container">
                <!-- TODO: If book is listed by logged in user then show the remove button otherwise do not-->
                <div class="row">
                    <div class="col-md-3"><a href="#">Book Title 2</a></div>
                    <div class="col-md-3">$0.00</div>
                    <div class="col-md-3"><a href="#"></a></div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#mark2Sold">Mark as Sold</button>
                    </div>
                </div>

                <!--The collapsible div under the book--> 
                <div id="mark2Sold" class="collapse">

                    <form>

                        <div class="row">
                            <div class="col-md-offset-1 col-md-9"><hr></div>
                        </div>
                        <!--Top row of the collapsible--> 

                        <div class="row clearfix">

                            <div class="col-md-offset-1 col-md-4">
                                <div class="form-inline">
                                    <label for="buyerEmail">Buyers Email:</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                            </div>
                            <div class="col-md-offset-1 col-md-2">
                                <div class="form-group">

                                    <i class="glyphicon glyphicon glyphicon-star"></i>
                                    <i class="glyphicon glyphicon glyphicon-star"></i>
                                    <i class="glyphicon glyphicon glyphicon-star-empty"></i>
                                    <i class="glyphicon glyphicon glyphicon-star-empty"></i>
                                    <i class="glyphicon glyphicon glyphicon-star-empty"></i>
                                </div>
                            </div>
                            <div clas="col-md-offset-2 col-md-2">
                                <div class="form-group">

                                    <button type="button" class="btn btn-default">Submit</button>
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>
                            </div>


                        </div>

                        <!--Bottom row of the collapsible--> 
                        <div class="row">
                            <div class="col-md-offset-1 col-md-9">
                                <div class="form-group">
                                    <label for="comment">Comment:</label>
                                    <textarea class="form-control" rows="4" id="comment"></textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-inline">
                                    <label>&nbsp;</label>

                                </div> 
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!--TODO: Search results maybe?--> 
        <div class="panel-footer text-center">
            <p>2 books listed</p>
        </div>
    </div>

    <div class="panel panel-default">

        <!--Search in the header-->
        <div class="panel-heading text-center clearfix">

            <div class="pull-left">
                <h3>Recent Purchases</h3>
            </div>
        </div>

        <div class="panel-body">

            <p>Nothing here currently...go buy some books! :)</p>

        </div>

        <!--TODO: Search results maybe?--> 
        <div class="panel-footer text-center">
            <p></p>
        </div>


    </div>
</div>
</body>
</html>
