<body>

<!-- Modal -->
<div id="momentsSection">
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Moments</h4>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                  <textarea class="form-control" rows="5" id="MomentsComment"></textarea>
                </div>

            </form>
          </div>
        <div class="modal-footer">
          <button id="ConfirmMoment" class="btn btn-default" type="submit" value="submit" onclick="confirmFunction()">Confirm</button>
          <button id="CancelMoment" type="button" class="btn btn-default" data-dismiss="modal" onclick="cancelFunction()">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>


      <a id="findButton" onclick="findUser()" class="btn btn-default">
        <span class="glyphicon glyphicon-screenshot"></span>
      </a>
</body>