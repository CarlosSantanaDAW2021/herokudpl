<div class="form-group">
    <label for="{{ $producto->id }}">{{ $producto->nombre }} | {{ $producto->precio }}€/U</label>
    <input type="number" name="{{ $producto->id }}" id="{{ $producto->id }}" class="form-control" value="0">
</div>