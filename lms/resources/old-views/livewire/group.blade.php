<div>
    <div class="form-group col-md-4">
        <br>
        <button type="button" name="add" id="add" class="btn btn-success"> <i class="voyager-plus"></i> Add
            More Times</button>
    </div>

    <div class="form-group  col-md-12 ">
        @foreach ($group_day_time as $g)
            <div class="form-group  col-md-4">
                <label class="control-label" for="group_day">Day</label>
                <select disabled class="form-control" name="addmore[0][group_day]" tabindex="-1" aria-hidden="true">
                    <option disabled>Choose day</option>
                    <option value="0" @if ($g->group_day == 0)  selected  @endif>Saturday</option>
                    <option value="1" @if ($g->group_day == 1)  selected @endif>Sunday</option>
                    <option value="2" @if ($g->group_day == 2)  selected @endif>Monday</option>
                    <option value="3" @if ($g->group_day == 3)  selected @endif>Tuesday</option>
                    <option value="4" @if ($g->group_day == 4)  selected @endif>Wednesday</option>
                    <option value="5" @if ($g->group_day == 5)  selected @endif>Thursday</option>
                    <option value="6" @if ($g->group_day == 6)  selected @endif>Friday</option>

                </select>
            </div>

            <div class="form-group  col-md-4 ">
                <label class="control-label" for="group_time">Time</label>
                <input type="time" class="form-control" name="addmore[0][group_time]" placeholder="choose time"
                    value="{{ $g->group_time }}" disabled>
            </div>
            <div class="form-group col-md-4">
                <br>
                <button type="button" wire:click="remove('{{ $g->id }}')" class="btn btn-danger">Remove</button>
            </div>

        @endforeach
    </div>



</div>
