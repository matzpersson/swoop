<div class="card p-2 m-3">
  
  <h1>Cumulative messages over time</h1>
  <article class="mt-2">
    <div class="row m-0 p-2">
      <div class="field col">
        <label for="DateFrom">From: </label>
        <input id="DateFrom" type="date" value="2016-01-01" class="form-control">
      </div>
      <div class="field col">
        <label for="DateFrom">To: </label>
        <input id="DateTo" type="date" value="2016-12-01" class="form-control">
      </div>
      <div class="field col">
        <label for="Class">Class: </label>
        <select id="Class"  class="form-control">
          <option value="Like">Like</option>
          <option value="Mention">Mention</option>
          <option value="Notification">Notification</option>
          <option value="Post">Post</option>
          <option value="Reply">Reply</option>      
        </select>
      </div>
      <div style="margin-top:32px;">
        <input type="button" value="Search" class="btn btn-danger Go">
      </div>
    </div>
    <div id="thechart" style="height: 450px; width: 100%;"></div>
  </article>

</div>