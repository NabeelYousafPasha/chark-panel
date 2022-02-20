@extends('dashboard.layout.app')

@section('stylesheets')
    {{-- iCheck --}}
    <link href="{{ asset('backend-assets/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('backend-assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>{{ trans('lang.terms_and_conditions') }}</h2>
            @includeIf('dashboard.globals.breadcrumb.breadcrumbs')
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ trans('lang.terms_and_conditions') }}</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content text-justify css-animation-box">
                        <div>
                            <p>
                                The present general conditions solely and exclusively govern the use of THE OWNER’S website
                                by USERS who gain access to it. The present general conditions are displayed on each and every
                                page of the website so that the USER can read, print, file and accept them over the internet
                                and be fully informed.
                            </p>

                            <p>
                                Access to THE OWNER’S website involves accepting the present conditions of use that the USER
                                declares to have fully understood. The USER agrees not to use the website, and the services offered
                                on it, to undertake activities contrary to the law and agrees to respect the present general
                                conditions at all times.
                            </p>

                            <br>

                            <ol>
                                <li>
                                    <h4>CONDITIONS OF ACCESS AND USE</h4>

                                    <ol>
                                        <li>
                                            The conditions of access and use of THE OWNER’S website do not entail the
                                            obligatory registration of the USER. The conditions of use of THE OWNER’S
                                            website are strictly governed by current legislation and by the principle
                                            of good faith by committing the USER to make good use of the website. All
                                            acts which compromise the legality, rights or interests of third parties
                                            are therefore prohibited: the right to privacy, data protection, intellectual
                                            property, etc. THE OWNER expressly prohibits the following:

                                            <br><br>

                                            <ol>
                                                <li>
                                                    Carrying out actions that may cause damage to THE OWNER’s systems or
                                                    those of third parties on the website or via the website by any means.
                                                </li>
                                                <li>
                                                    Carrying out any kind of advertising or adding commercial information
                                                    directly or in covert form, the sending of mass mailings (spamming)
                                                    or the sending of large messages that aim to block web servers (“mail bombing”)
                                                </li>
                                            </ol>

                                            <br>
                                        </li>

                                        <li>
                                            THE OWNER may interrupt access to its website for the USER at any time if
                                            it detects a use which is contrary to legality, good faith or the present general
                                            conditions- see fifth clause.
                                        </li>
                                    </ol>
                                    <br>
                                </li>

                                <li>
                                    <h4>CONTENTS</h4>

                                    <ol>
                                        <li>
                                            The contents included on this website have been developed and included by:
                                            <br><br>

                                            <ol>
                                                <li>
                                                    THE OWNER, uses internal and external sources, in such a way that
                                                    THE OWNER only makes himself responsible for content prepared internally.
                                                </li>
                                                <li>
                                                    THE OWNER reserves the right to alter content on the website at any time.
                                                    THE OWNER does not guarantee nor is responsible for the correct working
                                                    order of links to third parties websites on this website. Furthermore,
                                                    THE OWNER provides free and paid services offered by third parties on this
                                                    website that are governed by each of their particular conditions.
                                                    THE OWNER does not guarantee the truthfulness, accuracy or relevance of the
                                                    content and services offered by third parties, and remains expressly exempt
                                                    of any kind of responsibility for any damages or harm which could arise from
                                                    the lack of accuracy of the content and services.
                                                </li>
                                            </ol>
                                        </li>
                                    </ol>
                                    <br>
                                </li>

                                <li>
                                    <h4>RESPONSIBILITY</h4>

                                    <ol>
                                        <li>
                                            Under no circumstances THE OWNER is responsible for:
                                            <br><br>

                                            <ol>
                                                <li>
                                                    Faults or incidents that may occur in communications, defaced or incomplete
                                                    transmissions, so there is no guarantee that the services offered by the
                                                    website will be constantly operational.
                                                </li>
                                                <li>
                                                    Any kind of damage caused by USERS or third parties on the website.
                                                </li>
                                                <li>
                                                    The reliability or truthfulness of the information uploaded by third
                                                    parties to the website directly or through links. Additionally, THE OWNER
                                                    will collaborate and notify the competent authority of incidents when
                                                    reliable knowledge of illicit activity is received.
                                                </li>
                                            </ol>
                                            <br>
                                        </li>
                                        <li>
                                            Access to the website can be suspended without notice at the discretion of THE OWNER
                                            definitive or temporarily until ensuring accountability of possible damages.
                                            Additionally, THE OWNER will collaborate and notify the competent authority of
                                            incidents when reliable knowledge of illicit activity is received.
                                        </li>
                                    </ol>
                                    <br>
                                </li>

                                <li>
                                    <h4>COPYRIGHT AND TRADEMARK</h4>

                                    <ol>
                                        <li>
                                            THE OWNERS website - the content prepared internally, the source code and design
                                            of the website- is fully protected by copyright, and its reproduction, disclosure,
                                            distribution and transformation without explicit consent of THE OWNER is expressly
                                            prohibited. The USER declares legitimate responsibility of any artwork or written
                                            material sent via any method available on the website is their property and agrees
                                            to transfer the reproductive and distribution rights to THE OWNER.
                                        </li>
                                    </ol>
                                    <br>
                                </li>

                                <li>
                                    <h4>CONSENT FOR PROCESSING PERSONAL DATA THAT COULD BE INCLUDED IN FORMS</h4>

                                    <ol>
                                        <li>
                                            All the data provided in forms on this website with be held strictly
                                            confidential. We inform the USER that all data provided will be added to a
                                            file for processing by GROUP ORTOPLUS.
                                        </li>

                                        <li>
                                            We inform the USER of their right to request the amendment or removal of their
                                            personal data, their right to establish restrictions on the processing of
                                            their data or their right to oppose to the processing or transfer of their
                                            data. The USER also has the right to submit a complaint to a supervisory authority.

                                            <br>
                                            Communications can be remitted to:
                                            <br>
                                            <br>
                                            LABORATORIO ORTOPLUS S.L.
                                            <br>
                                            CL. FLAUTA MÁGICA Nº 22
                                            <br>
                                            29006 MALAGA
                                        </li>
                                    </ol>
                                    <br>
                                </li>

                                <li>
                                    <h4>JURISDICTION AND APPLICABLE LAW</h4>

                                    <ol>
                                        <li>
                                            The present general conditions are governed by spanish legislation. The Juzgados
                                            de Málaga (courts) are proficient in resolving any disputes or conflicts that
                                            may arise from the present general conditions. The USER expressly waives their
                                            right to any other jurisdiction to which they might otherwise have a right.
                                        </li>
                                    </ol>
                                    <br>
                                </li>

                                <li>
                                    <h4>NOTE</h4>

                                    <ol>
                                        <li>
                                            In the event of any clause from this document being invalid, the other clauses
                                            will remain in full force and effect and will be interpreted considering the
                                            will of the parties concerned, maintaining the same purpose as established in
                                            the present conditions. THE OWNER may choose not to enforce any of the rights
                                            and powers conferred in this document, this would not imply in any case that
                                            these right and powers would be renounced, except by express recognition by
                                            THE OWNER.
                                        </li>
                                    </ol>
                                    <br>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- iCheck -->
    <script src="{{ asset('backend-assets/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
@endsection
