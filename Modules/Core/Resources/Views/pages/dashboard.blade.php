@extends('core::adminlayouts.adminmaster')

@section('content')
  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip(); //Tooltip on icons top

      $('.popoverOption').each(function () {
        var $this = $(this);
        $this.popover({
          trigger: 'hover',
          placement: 'left',
          container: $this,
          html: true,

        });
      });
    });
  </script>

  <div class="div">

    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>
              @foreach($ticketCompletedThisMonth as $thisMonth)
                {{$thisMonth->total}}
              @endforeach
            </h3>

            <p>Tickets completed this month</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-book-outline"></i>
          </div>
          <a href="{{route('tickets.index')}}" class="small-box-footer">All tickets <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>
              @foreach($leadCompletedThisMonth as $thisMonth)
                {{$thisMonth->total}}
              @endforeach
            </h3>

            <p>Leads completed this month</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{route('leads.index')}}" class="small-box-footer">All leads <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{$totalRelations}}</h3>

            <p>All Relations</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="{{route('admin.relations.relations.index')}}" class="small-box-footer">All relations <i
              class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>
              @foreach($totalTimeSpent[0] as $sum => $value)

                {{$value}}
              @endforeach
              @if($value == "")
                0
              @endif</h3>

            <p>Total hours registered</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

    <?php $createdTicketEachMonths = array(); $ticketCreated = array();?>
    @foreach($createdTicketsMonthly as $ticket)
      <?php $createdTicketEachMonths[] = date('F', strTotime($ticket->created_at)) ?>
      <?php $ticketCreated[] = $ticket->month;?>
    @endforeach

    <?php $completedTicketEachMonths = array(); $ticketCompleted = array();?>

    @foreach($completedTicketsMonthly as $tickets)
      <?php $completedTicketEachMonths[] = date('F', strTotime($tickets->updated_at)) ?>
      <?php $ticketCompleted[] = $tickets->month;?>
    @endforeach

    <?php $completedLeadEachMonths = array(); $leadsCompleted = array();?>
    @foreach($completedLeadsMonthly as $leads)
      <?php $completedLeadEachMonths[] = date('F', strTotime($leads->updated_at)) ?>
      <?php $leadsCompleted[] = $leads->month;?>
    @endforeach

    <?php $createdLeadEachMonths = array(); $leadCreated = array();?>
    @foreach($createdLeadsMonthly as $lead)
      <?php $createdLeadEachMonths[] = date('F', strTotime($lead->created_at)) ?>
      <?php $leadCreated[] = $lead->month;?>
    @endforeach
    <div class="row">

      @include('partials.dashboardone')


    </div>
@endsection
