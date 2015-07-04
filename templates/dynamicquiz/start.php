<?php
    include'header.php';
?>
    <div class="container dynamic-quiz" role="main">
        <div class="row">
            <div class="col-sm-12">
                <p>Provide some details about yourself to get started</p>
            </div>

            <div class="col-sm-5">
                <p><button>Connect via Facebook</button></p>
                <p>TODO</p>
            </div>

            <div class="col-sm-2">
                <p>- OR -</p>
            </div>

            <div class="col-sm-5">
                <form id="dynamic-quiz-start" method="post" action="<?php echo $root; ?>/dynamicquiz/question">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-control">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" id="age" placeholder="Age" name="age" />
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <select name="location" class="form-control">
                            <option>Australian Capital Territory</option>
                            <option>New South Wales</option>
                            <option>Queensland</option>
                            <option>Western Australia</option>
                            <option>Tasmania</option>
                            <option>South Australia</option>
                            <option>Northern Territory</option>
                            <option>Victoria</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Start</button>
                    <input type="hidden" name="starting" value="1" />
                </form>
            </div>
        </div>
    </div>

<?php include 'footer.php';