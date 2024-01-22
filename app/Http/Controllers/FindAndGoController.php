<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use Illuminate\Http\Request;

class FindAndGoController extends Controller
{
    public function index()
    {
        return view('find_Instrumments');
    }

    public function getSearch()
    {
        return view('testSearch');
    }

    public function testSearch(Request $request)
    {

        if ($request->ajax()) {
            $data = Instrument::where('code', 'like', '%' . $request->search . '%')
                ->get();

            $output = '';
            if (count($data) > 0) {
                foreach ($data as $row) {
                    $output = '
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12" style=" margin: auto;
                        margin-top: 5%; width: 50%; padding: 10px;">

                                    <div class="product-grid-item mb-30">
                                    <a href="' . url('find/' . $row->id) . '">
                                        <div class="product-img mb-3">
                                           <img src="' . url('uploads/instruments/' . $row->image) . '" class="w-100" alt="">
                                        </div>
                                        <div class="product-content">
                                            <h6 class="mb-10">' . $row->code . '</h6>
                                            <p class="black">' . $row->name . '</p>

                                        </div>
                                        </a>
                                    </div>
                                    <!-- End Product Grid Item -->
                                </div>
                            ';
                }
                $output .= '
                    </tbody>
                    </table>
                    </div>';


            } else {
                $output .= 'No results';
            }
            return $output;
        }
    }

}
