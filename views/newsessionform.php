<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Create Session
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Session</h4>
      </div>
      <div class="modal-body">
        <form id="createsession-form" class="form-horizontal" action='postActivity.php' method='post'>
          <div class="form-group">
            <label for="sportcat" class="col-sm-2 control-label">Sport</label>
            <div class="col-sm-8">
              <select class="form-control" name="sport">
              <?php $val = $m->sports->sport->find();
              foreach($val as $doc) {
                echo "<option value=".$doc['internal'].">".$doc['name']."</option>";
              }
             ?>
            </select>
            </div>
          </div>
          <div class="form-group">
            <label for="sessiondate" class="col-sm-2 control-label">Date and Time</label>
            <div class="col-sm-8">
              <input name"sessiondate" type="text" class="form-control datepicker" data-provide="datepicker" id="sessiondate" placeholder="Date">
              <div class="" style="height:3px; display:block;"></div>
              <input name"sessiontime" type="text" class="form-control" id="sessiontime" placeholder="14:25">
            </div>
          </div>
          <div class="form-group">
            <label for="skilllevel" class="col-sm-2 control-label">Skill Level</label>
            <div class="col-sm-8">
              <select id="skilllevel" class="form-control" name="skilllevel">
                <option>Any Skill Level</option>
                <option>Beginner</option>
                <option>Amateur</option>
                <option>Pro</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="opponentgender" class="col-sm-2 control-label">SportMate Gender</label>
            <div class="col-sm-8">
              <select id="opponentgender" class="form-control" name="opponentgender">
                <option>Any</option>
                <option>Female</option>
                <option>Male</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="venue" class="col-sm-2 control-label">Venue</label>
            <div class="col-sm-8">
              <select id="venue" class="form-control" name="venue">
                <option value="activityroom">Activity Room</option>
                <option value="option">Bouldering Room</option>
                <option value="option">Climbing Centre</option>
                <option value="option">Desso Hall</option>
                <option value="option">Main Hall</option>
                <option value="option">Squash Court</option>
                <option value="option">Studio</option>
                <option value="option">Astro Pitch</option>
                <option value="option">Athletic Track</option>
                <option value="option">Dance Studio</option>
                <option value="option">Games Hall</option>
                <option value="option">Tennis Court</option>
                <option value="option">Other...</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="sessiondescription" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-8">
              <textarea id="sessiondescription" class="form-control" rows="3" name="sessiondescription"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
              Please ensure that you have the appropriate sports membership, provide details of equipment required and if there are any other additional costs.
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
              <button id="submitnewsessionbtn" type="submit" class="btn btn-default">Create</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(function() {
  $('.datepicker').datepicker({
      format: 'dd-mm-yyyy',
  });

});
</script>
