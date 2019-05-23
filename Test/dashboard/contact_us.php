<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Happy to Help!</h4>
                    </div>
                    <div class="content">
                        <form>
                            <div class="row">


                            </div>

                            <div class="row">

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" class="form-control" placeholder="Address"  ng-model="subject">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Here can be your description"  ng-model="msg" ></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right" ng-click="askForHelp()">Ask for Help!</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        	<table class="table table-hover table-striped">
        		<thead>
        			<th>Date</th>
        			<th>Subject</th>
        			<th>Message</th>
        			<th>Reply</th>
        			<th>Status</th>

        		</thead>
        		<tbody ng-repeat="data in userdata">
              <th>{{data.date}}</th>
        			<th>{{data.subject}}</th>
        			<th>{{data.message}}</th>
        			<th>{{data.reply}}</th>
        			<th>{{data.status}}</th>

            </tbody>
          </table>

        </div>
    </div>
</div>
