@extends('layouts.master')

@section('content')

  <thing-editor :data="{{ json_encode($thing) }}"></thing-editor>

  @if ($thing->id)
      <thing-image-editor :thing-id="{{ $thing->id }}" :data="{{ json_encode($thing->image) }}"></thing-image-editor>
  @endif

  @if ($thing->id)
        <thing-settings-editor :thing-id="{{ $thing->id }}" :data="{{ json_encode($thing->library_settings) }}"></thing-settings-editor>
  @endif

 @if($thing->id)
  <div class="card mb-3">

    <div class="card-header">
        <div class="row align-items-center">
            <h5 class="col mb-0">
                <a name="items">Aktive eksemplarer</a>
            </h5>
            @if (!$thing->trashed())
                <a href="https://www.uio.no/for-ansatte/enhetssider/ub/publikumsarbeid/bibrex.html" target="_blank" class="btn btn-link col col-auto mx-1">
                    <i class="far fa-question-circle"></i>
                    Hjelp
                </a>
                <a href="{{ action('ItemsController@editForm', ['item' => '_new', 'thing' => $thing]) }}" class="btn btn-success col col-auto mx-1">
                    <i class="far fa-plus-hexagon"></i>
                    Nytt eksemplar
                </a>
            @endif
        </div>
    </div>

    <items-table :data="{{ json_encode($items) }}" :show-library="true"></items-table>
  </div>


  <div class="card mb-3">

    <div class="card-header">
      <h5>
          <a name="deleted">Slettede og tapte eksemplarer</a>
      </h5>
    </div>

    <ul class="list-group list-group-flush">
      @if ($thing->items()->onlyTrashed()->count() == 0)
        <li class="list-group-item">
            <em>Ingen</em>
        </li>
      @endif
      @foreach ($thing->items()->onlyTrashed()->get() as $item)
        <li class="list-group-item">
            <a href="{{ action('ItemsController@show', $item->id) }}"><samp>{{ $item->barcode }}</samp></a>
            {{ $item->is_lost ? '(tapt)' : '(slettet)' }}
            @if ($item->note)
            Note: {{ $item->note }}
            @endif
        </li>
      @endforeach
    </ul>
  </div>


  <div class="card mb-3">
      <div class="card-header">
          <div class="row align-items-center">
              <h5 class="col mb-0">
                  <a name="meta">Meta</a>
              </h5>
          </div>
      </div>
      <ul class="list-group list-group-flush">

          <li class="list-group-item">
              <div class="row">
                  <div class="col-sm-2">
                      Opprettet:
                  </div>
                  <div class="col">
                      {{ $thing->created_at }}
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-2">
                      Antall utlån totalt:
                  </div>
                  <div class="col">
                      {{ $stats['loans']['total'] }}
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-2">
                      Antall utlån i år:
                  </div>
                  <div class="col">
                      {{ $stats['loans']['this_year'] }}
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-2">
                      Antall utlån i fjor:
                  </div>
                  <div class="col">
                      {{ $stats['loans']['last_year'] }}
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-2">
                      Antall eksemplarer tapt:
                  </div>
                  <div class="col">
                      {{ $stats['items']['lost'] }}
                  </div>
              </div>
          </li>

      </ul>
  </div>

 @endif
  {{--



        <div class="card-body">

        <h3>Aktive lån</h3>
        @foreach ($loans = $thing->activeLoans() as $nr => $loan)
          <hr>

          <div class="row">
            <div class="col-2">
              <strong>Låntaker:</strong>
            </div>
            <div class="col-6">
              <a href="{{ URL::action('UsersController@getShow', $loan->user->id) }}">
                {{ $loan->user->lastname }},
                {{ $loan->user->firstname }}
              </a>
            </div>
          </div>

          <div class="row">
            <div class="col-2">
              <strong>Utlånt:</strong>
            </div>
            <div class="col-6">
              {{ $loan->created_at }}
            </div>
          </div>

          <div class="row">
            <div class="col-2">
              <strong>Returnert:</strong>
            </div>
            <div class="col-6">
              {{ $loan->deleted_at }}
            </div>
          </div>

        @endforeach
        @if (count($loans) == 0)
          <div>
            <em>Ingen aktive lån</em>
          </div>
        @endif

        <h3>Lånehistorikk</h3>
        <ul>
        @foreach ($loans = $thing->allLoans() as $nr => $loan)

          <li style="clear:both;">
            <big class="col-1" style="float:right;">{{ (count($loans) - $nr) }}</big>
            <a href="{{ URL::action('UsersController@getShow', $loan->user->id) }}">
              {{ $loan->user->lastname }},
              {{ $loan->user->firstname }}
            </a><br />
            ({{ $loan->created_at }} – {{ $loan->deleted_at }})
          </li>

        @endforeach
        </ul>
        @if (count($loans) == 0)
          <div>
            <em>Ingen lånehistorikk</em>
          </div>
        @endif

    </div>

  </div>--}}



@stop


@section('scripts')

<script type='text/javascript'>
  $(document).ready(function() {

  });
</script>

@stop
