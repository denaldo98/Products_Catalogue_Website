@extends('layouts.public')

@section('title', 'Il sito')

@section('content')
<br>

        <h1 style="font-weight: bold;">Informazioni sul sito</h1>

        <div class="info">
            <h3>Note legali</h3>
            <p>
                Electronically, in qualità  di Titolare del trattamento, La informa che i suoi dati personali (nome, cognome, C.F., copia D.I., indirizzo mail, indirizzi di fatturazione e consegna, eventuali riprese TVCC) formeranno oggetto di trattamento nel rispetto della normativa in materia di protezione dei dati personali prevista dal Regolamento UE n. 2016/679.
                <br><strong>A) Finalità  del trattamento dei dati</strong>

                <br>Il trattamento dei dati personali è diretto all'espletamento dei seguenti compiti:

                <br>1. Adempimenti di tutti gli obblighi contrattuali: l'utilizzo dei dati ha lo scopo di assicurare la fornitura e la consegna della merce;

                <br>2. Adempimenti di legge connessi: l'utilizzo dei dati ha lo scopo di elaborare gli adempimenti fiscali;

                <br>3. Per l'invio di materiale pubblicitario;

                <br>4. Per lo svolgimento di analisi di mercato e di indagini di soddisfazione del cliente: l'utilizzo dei dati ha lo scopo di identificare, anche mediante elaborazioni elettroniche, comportamenti e abitudini di consumo in modo da migliorare i servizi forniti ed indirizzare le proposte commerciali di interesse dell'utente;

                <br>5. Interesse legittimo: il trattamento dei dati quali la registrazione delle immagini TVCC ha lo scopo di prevenire condotte illecite (es. furti, rapine) e saranno mantenute non oltre le 48 ore.

                <br><strong>B) Conferimento dei dati</strong>

                <br>Il conferimento dei dati riguardanti la finalità  di cui al punto (1) e (2) ha natura obbligatoria senza i quali non è possibile dar luogo all'esecuzione degli obblighi contrattuali ivi specificati e la conservazione avverrà  per il periodo consentito dalla legge; Il conferimento dei dati di cui al punto (3), (4), (5) non ha natura obbligatoria ma è utile al miglioramento della qualità  dei nostri rapporti. I dati di cui ai punti (3) e (4) saranno mantenuti fino alla revoca del consenso e/o all'interruzione del rapporto contrattuale.

                <br><strong>C) Comunicazione dei dati e "Trasferimento dei dati all'estero"</strong>

                <br>I dati personali raccolti potranno essere comunicati, per quanto di loro specifica competenza, a pubbliche amministrazioni per lo svolgimento delle funzioni istituzionali, a istituti bancari, a soggetti specializzati nella gestione dei sistemi informativi e/o dei sistemi di pagamento, a soggetti che forniscono i beni e servizi offerti da Electronically , a soggetti che effettuano attività  di trasporto o spedizione, a soggetti di cui Electronically si avvalga per lo svolgimento di attività  promozionali, pubblicitarie, di marketing e comunicazione, a studi legali e di consulenza, a soggetti incaricati della tenuta della contabilità  o della revisione del bilancio, a pubbliche autorità  per gli adempimenti di legge.

                <br>I dati personali non saranno in ogni caso oggetto di diffusione.

                <br>Nei limiti strettamente necessari all'esecuzione del rapporto contrattuale, i Suoi dati personali potranno essere comunicati a soggetti terzi, quali a titolo esemplificativo i fornitori di prodotti e/o servizi, ubicati sia all'interno dell'Unione Europea sia al di fuori della stessa. L'eventuale trasferimento extra UE è normato da appositi contratti atti ad imporre al del destinatario il rispetto delle adeguate garanzie previste dalla vigente normativa.

                <br><strong>D) Diritti dell'interessato</strong>

                <br>La informiamo altresì che, potrà  chiedere di accedere e conoscere i dati che La riguardano richiedendo che di tali dati venga effettuato l'aggiornamento, la rettifica, l'integrazione, la limitazione o la cancellazione fatto salvo il diritto che la suddetta Legge Le riconosce di opporsi, in tutto o in parte, a tale utilizzo e di proporre reclamo all'autorità  di controllo.

                <br>Potrà  far valere i suoi diritti rivolgendosi per iscritto a mezzo e-mail all'indirizzo <a href="mailto:electrically@gmail.com">electrically@gmail.com</a>.
            </p>
        </div>
        <br>
        <div class="info">
            <h3>Iscrizione ed autenticazione</h3>
            <p>
              Effettuando l'iscrizione al sito potrai consultare il catalogo visualizzando anche l'eventuale sconto sui prodotti in vendita.
              <br>Per autenticarti o iscriverti clicca sulla sezione del menu <a href="{{ route('login') }}">"ACCEDI"</a>. Questa ti porterà  ad una pagina di login. Se hai già  un account procedi con
              l'autenticazione per usufruire dei vantaggi, altrimenti clicca sul link in basso per <a href="{{ route('register') }}">registrarti</a>.
              <br>
              <br>
            </p>
        </div>
@endsection
