@push('styles')
<style>
    .puzzle-container {
        display: flex;
        justify-content: center;
        gap: 50px;
        margin-top: 30px;
    }

    .puzzle-area {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .drop-zone,
    .piece {
        width: 150px;
        height: 50px;
        border: 2px dashed #555;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: white;
        cursor: grab;
    }

    .drop-zone {
        background-color: #e6f7ff;
        position: absolute;
    }

    .drop-zone.filled {
        border: 2px solid green;
    }

    #result {
        margin-top: 30px;
        font-size: 20px;
    }

    /* For positioning image and SVG overlay */
    .image-wrapper {
        position: relative;
        display: inline-block;
    }

    .image-wrapper img {
        display: block;
        max-width: 100%;
    }

    .overlay-line {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    /* Optional: Visual target point */
    .target-point {
        position: absolute;
        width: 10px;
        height: 10px;
        background-color: blue;
        border-radius: 50%;
    }
</style>
@endpush

<div class="px-2">
    <div class="p-3 bg-white mb-2 mx-0">
        <h5 class="">Quiz Interaktif Sel Tumbuhan</h5>
    </div>
    <div class="row gap-2 mx-0">
        <div class="col-md-9 col-sm-12 bg-white p-3" wire:ignore>
            <div class="puzzle-container">
                <div class="image-wrapper mt-5 mx-auto">

                    <!-- Background image -->
                    <img style="padding: 100px;" src="{{ asset('assets/images/sel tumbuhan.jpg') }}" alt="Sel Tumbuhan"
                        draggable="false">

                    <!-- SVG overlay line -->

                    <svg class="overlay-line" xmlns="http://www.w3.org/2000/svg">
                        @for ($i = 1; $i
                        <= 16; $i++) <line id="mark-line-{{ $i }}" x1="0" y1="0" x2="0" y2="0" stroke="red"
                            stroke-width="2" />
                        @endfor
                    </svg>

                    <!-- Target point on the image (destination) -->
                    <div id="target-point-1" class="target-point" style="left: 250px; top: 160px;"></div>
                    <div id="target-point-2" class="target-point" style="left: 320px; top: 130px;"></div>
                    <div id="target-point-3" class="target-point" style="left: 340px; top: 145px;"></div>

                    <!-- Drop zone (source of line) -->
                    <div style="left: 100px; top: 10px; position: absolute;">
                        <div class="drop-zone" data-answer="1">RE Kasar</div>
                    </div>
                    <div style="left: 300px; top: 10px; position: absolute;">
                        <div class="drop-zone" data-answer="2">Ribosom</div>
                    </div>
                    <div style="right: 65px; top: 80px; position: absolute;">
                        <div class="drop-zone" data-answer="3">Peroksiom</div>
                    </div>

                    <!-- ========== LEFT SIDE LABELS ========== -->
                    <div id="drop-zone-4" class="drop-zone draggable" data-answer="4" style="left: -70px; top: 80px;">
                        Mitokondria
                    </div>
                    <div id="target-point-4" class="target-point draggable" style="left: 150px; top: 150px;"></div>

                    <div id="drop-zone-5" class="drop-zone draggable" data-answer="5" style="left: -70px; top: 140px;">
                        Amyloplas
                    </div>
                    <div id="target-point-5" class="target-point draggable" style="left: 150px; top: 200px;"></div>

                    <div id="drop-zone-6" class="drop-zone draggable" data-answer="6" style="left: -70px; top: 200px;">
                        Beppide
                        Kristal</div>
                    <div id="target-point-6" class="target-point draggable" style="left: 175px; top: 235px;"></div>

                    <div id="drop-zone-7" class="drop-zone draggable" data-answer="7" style="left: -70px; top: 260px;">
                        Vakuola
                    </div>
                    <div id="target-point-7" class="target-point draggable" style="left: 220px; top: 290px;"></div>

                    <div id="drop-zone-8" class="drop-zone draggable" data-answer="8" style="left: -70px; top: 320px;">
                        Kloroplas
                    </div>
                    <div id="target-point-8" class="target-point draggable" style="left: 160px; top: 330px;"></div>

                    <div id="drop-zone-9" class="drop-zone draggable" data-answer="9" style="left: -70px; top: 380px;">
                        Druse
                        Kristal</div>
                    <div id="target-point-9" class="target-point draggable" style="left: 240px; top: 340px;"></div>

                    <div id="drop-zone-10" class="drop-zone draggable" data-answer="10"
                        style="left: -70px; top: 460px;">Badan
                        Golgi</div>
                    <div id="target-point-10" class="target-point draggable" style="left: 160px; top: 400px;"></div>

                    <!-- ========== RIGHT SIDE LABELS ========== -->
                    <div id="drop-zone-11" class="drop-zone draggable" data-answer="11"
                        style="right: -85px; top: 140px;">Nukleus
                    </div>
                    <div id="target-point-11" class="target-point draggable" style="left: 320px; top: 180px;"></div>

                    <div id="drop-zone-12" class="drop-zone draggable" data-answer="12"
                        style="right: -85px; top: 200px;">
                        Nukleolus</div>
                    <div id="target-point-12" class="target-point draggable" style="left: 300px; top: 200px;"></div>

                    <div id="drop-zone-13" class="drop-zone draggable" data-answer="13"
                        style="right: -85px; top: 255px;">RE Halus
                    </div>
                    <div id="target-point-13" class="target-point draggable" style="left: 350px; top: 240px;"></div>

                    <div id="drop-zone-14" class="drop-zone draggable" data-answer="14"
                        style="right: -85px; top: 310px;">
                        Sitoplasma</div>
                    <div id="target-point-14" class="target-point draggable" style="left: 368px; top: 300px;"></div>

                    <div id="drop-zone-15" class="drop-zone draggable" data-answer="15"
                        style="right: -85px; top: 370px;">Membran
                        Sel</div>
                    <div id="target-point-15" class="target-point draggable" style="left: 368px; top: 400px;"></div>

                    <div id="drop-zone-16" class="drop-zone draggable" data-answer="16"
                        style="right: -85px; top: 450px;">Dinding
                        Sel</div>
                    <div id="target-point-16" class="target-point draggable" style="left: 380px; top: 450px;"></div>


                </div>

                <!-- Puzzle pieces -->

            </div>
            <div class="pieces mt-5 wrap row gap-2 align-items-center justify-content-center">
                <div class="piece" draggable="true" data-id="1">RE Kasar</div>
                <div class="piece" draggable="true" data-id="2">Ribosom</div>
                <div class="piece" draggable="true" data-id="3">Peroksiom</div>
                <div class="piece" draggable="true" data-id="4">Mitokondria</div>
                <div class="piece" draggable="true" data-id="5">Amyloplas</div>
                <div class="piece" draggable="true" data-id="6">Beppide Kristal </div>
                <div class="piece" draggable="true" data-id="7">Vakuola</div>
                <div class="piece" draggable="true" data-id="8">Kloroplas</div>
                <div class="piece" draggable="true" data-id="9">Druse Kristal</div>
                <div class="piece" draggable="true" data-id="10">Badan Golgi</div>
                <div class="piece" draggable="true" data-id="11">Nukleus</div>
                <div class="piece" draggable="true" data-id="12">Nukleolus</div>
                <div class="piece" draggable="true" data-id="13">RE Halus</div>
                <div class="piece" draggable="true" data-id="14">Sitoplasma</div>
                <div class="piece" draggable="true" data-id="15">Membran Sel</div>
                <div class="piece" draggable="true" data-id="16">Dinding Sel</div>
            </div>

            <p id="result"></p>
        </div>
        <div class="col bg-white p-3">
            <form wire:submit='save'>
                <div class="row mt-5">
                    <div class="col-6 text-center">
                        <h2 class="text-success" id="label-correct"> {{ $this->correctAnswers }} </h2>
                        <span class="text-success">Benar</span>
                    </div>

                    <div class="col-6 text-center">
                        <h2 class="text-danger" id="label-wrong"> {{ $this->wrongAnswers }} </h2>
                        <span class="text-danger">Salah</span>
                    </div>
                </div>

                <input type="number" wire:model='correctAnswers' hidden name="correct" id="input-correct">
                <input type="number" wire:model='wrongAnswers' hidden name="wrong" id="input-wrong">

                <div class="d-flex flex-column mt-5 mx-3">
                    @if ($this->canSave)
                    <button class="btn btn-primary" id="save-button">Simpan</button>
                    @else
                    <button class="btn btn-outline-secondary" disabled id="save-button">Simpan</button>
                    @endif
                </div>
            </form>
            <hr class="my-4">
            <div>
                <h5 class="text-center">Attempt History</h5>
            </div>
            <table class="table text-center table-stripped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col "><i class="bi bi-check-lg text-success"></i></th>
                        <th scope="col "><i class="bi bi-x text-danger"></i></th>
                        <th scope="col">Point</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userQuizResults as $i => $item)
                        <tr>
                            <th scope="row">{{$i + 1}}</th>
                            <th class="fw-light text-success">{{$item->correct_count}}</th>
                            <th class="fw-light text-danger">{{$item->wrong_count}}</th>
                            <th class="fw-light">{{ (int)($item->point * 100) }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const pieces = document.querySelectorAll('.piece');
const dropZones = document.querySelectorAll('.drop-zone');
const result = document.getElementById('result');

const labelCorrect = document.getElementById('label-correct');
const labelWrong = document.getElementById('label-wrong');
const inputCorrect = document.getElementById('input-correct');
const inputWrong = document.getElementById('input-wrong');

pieces.forEach(piece => {
  piece.addEventListener('dragstart', dragStart);
});

dropZones.forEach(zone => {
  zone.addEventListener('dragover', dragOver);
  zone.addEventListener('drop', dropPiece);
});

function dragStart(e) {
  e.dataTransfer.setData("text/plain", e.target.dataset.id);
}

function dragOver(e) {
  e.preventDefault();
}

function dropPiece(e) {
        e.preventDefault();

        const labelCorrect = document.getElementById('label-correct');
        const labelWrong = document.getElementById('label-wrong');
        const inputCorrect = document.getElementById('input-correct');
        const inputWrong = document.getElementById('input-wrong');

        const draggedId = e.dataTransfer.getData("text/plain");
        const correctAnswer = e.target.dataset.answer;

        if (e.target.classList.contains('filled') && e.target.classList.contains('success')) {
            return;
        }

        const draggedElement = document.querySelector(`.piece[data-id="${draggedId}"]`);
        e.target.classList.add('filled');
        draggedElement.remove();

        if (draggedId === correctAnswer) {
            e.target.style.backgroundColor = "#c8f7c5";
            e.target.textContent = draggedElement.textContent;
            e.target.classList.add('success');

            Livewire.dispatch('updateAnswers', {
                correct: parseInt(labelCorrect.innerText) + 1,
                wrong: parseInt(labelWrong.innerText)
            });
        } else {
            e.target.style.backgroundColor = "#f7c5c5";

            Livewire.dispatch('updateAnswers', {
                correct: parseInt(labelCorrect.innerText),
                wrong: parseInt(labelWrong.innerText) + 1
            });
        }
    }


    function drawLineBetween(dropSelector, targetSelector, lineId) {
        const drop = document.querySelector(dropSelector);
        const target = document.querySelector(targetSelector);
        const line = document.getElementById(lineId);

        const dropRect = drop.getBoundingClientRect();
        const targetRect = target.getBoundingClientRect();
        const svg = line.closest('svg');
        const svgRect = svg.getBoundingClientRect();

        // Calculate center positions
        const x1 = dropRect.left + dropRect.width / 2 - svgRect.left;
        const y1 = dropRect.top + dropRect.height / 2 - svgRect.top;
        const x2 = targetRect.left + targetRect.width / 2 - svgRect.left;
        const y2 = targetRect.top + targetRect.height / 2 - svgRect.top;

        line.setAttribute('x1', x1);
        line.setAttribute('y1', y1);
        line.setAttribute('x2', x2);
        line.setAttribute('y2', y2);
    }

// Optional: Auto draw line on load (if already placed)
window.addEventListener('livewire:initialized', () => {
    for (let i = 1; i <= 16; i++) {
        drawLineBetween('.drop-zone[data-answer="'+i+'"]', `#target-point-${i}`, `mark-line-${i}`);
    }
});
</script>
@endpush