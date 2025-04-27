@php
    $exif = is_array($exif) ? $exif : [];
@endphp
@if ($exif && count($exif) > 0)
    <div class="photo-exif">
        <table>
            <thead>
                <tr>
                    <th>Property</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                @if (array_key_exists('ApertureValue', $exif))
                    <tr>
                        <td>
                            <span class="material-symbols-outlined">camera</span> Aperture
                        </td>
                        <td>{{ $exif['ApertureValue'] }}</td>
                    </tr>
                @endif

                @if (array_key_exists('ISOSpeedRatings', $exif))
                    <tr>
                        <td>
                            <span class="material-symbols-outlined">shutter_speed</span> ISO
                        </td>
                        <td>{{ $exif['ISOSpeedRatings'] }}</td>
                    </tr>
                @endif

                @if (array_key_exists('FocalLength', $exif))
                    <tr>
                        <td>
                            <span class="material-symbols-outlined">trail_length_medium</span> Focal Length
                        </td>
                        <td>{{ $exif['FocalLength'] }}</td>
                    </tr>
                @endif

                @if (array_key_exists('ExposureTime', $exif))
                    <tr>
                        <td>
                            <span class="material-symbols-outlined">exposure</span> Exposure
                        </td>
                        <td>{{ $exif['ExposureTime'] }}</td>
                    </tr>
                @endif

                @if (array_key_exists('WhiteBalance', $exif))
                    <tr>
                        <td>
                            <span class="material-symbols-outlined">contrast</span> White Balance
                        </td>
                        <td>{{ $exif['WhiteBalance'] }}</td>
                    </tr>
                @endif

                @if (array_key_exists('Flash', $exif) && $exif['Flash'])
                    <tr>
                        <td>
                            <span class="material-symbols-outlined">flash_on</span> Flash
                        </td>
                        <td>{{ $exif['Flash'] }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endif
