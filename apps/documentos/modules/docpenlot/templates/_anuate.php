<?php echo select_tag('dfatendoc[anuate]', options_for_select(Constantes::listaEstadoDocumento(), $dfatendoc->getAnuate(),'include_custom=Seleccione...')) ?>