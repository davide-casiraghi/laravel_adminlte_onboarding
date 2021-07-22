{{--
    SELECT Dropdown

    PARAMETERS:
        - $title: string - the title to show
        - $name: string - the select name attribute
        - $placeholder: string - the text shown when nothing is selected 
        - $tooltip: string - the content of the tooltip
        - $value: the selected value
        - $record: the content of the selected value
--}}

<div class="form-group {{ $name }}">
    @if(!empty($title))
        <label for="{{ $name }}">{{ $title }}@if($required) <span class="dark-gray" data-toggle="tooltip" data-placement="top" title="@lang('views.required')">*</span>@endif</label>
    @endif
    <select name="{{ $name }}" id="{{ $name }}" class="selectpicker" data-live-search="{{ $liveSearch }}" title="{{$placeholder}}">
        @if(!empty($placeholder))
            <option value="" class="text-gray-500">{{$placeholder}}</option>
        @endif
        
        @foreach ($records as $value => $record)
            <option value="{{$value}}" @if(!empty($selected)) {{  $selected == $value ? 'selected' : '' }}@endif>{{ $record }}</option>
        @endforeach
    </select>
    @if ($errors->has($name))
        <span class="invalid-feedback" role="alert" style="display:block;">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>
