Contao Extension: MonitoringScanClientWorkerUpdateGooglemapsInstalled
===============================================================

Stellt eine Komponente, zum Aktualisieren des Systems eines überwachten Eintrags mit den gescannten Google Maps-Daten vom Client bereit.

Zu beachten ist das in der Listenansicht die Spalten "Letztes Test Datum" und "Unerledigte Aufgaben" entfernt wurden, außerdem wird in der Spalte Webseite
das http:// bzw. https:// und der Schrägstrich am Ende der URL entfernt. Die Listenansicht wird um die Spalte Google Maps ergänzt, in dieser befinden sich die Anzahl angelegten
Karten, der Status ob die dlh_googlemaps Erweiterung installiert ist und die Domain bzw. die Sprache der Webseitenwurzel und der dazugehörige API-Key.


Provides a component to update the system of a monitored entry with the scanned google maps data from the client.

Please note that in the list view the columns "Last test date" and "Unfinished tasks" have been removed. Also, the http:// or https:// and the slash at the end of the domain,
in the column website were removed. The list view will be added by the column Google Maps in wich the number of existing maps, the status if the dlh_googlemaps is installed and
the domain or language of the website root and the associated API key.


Installation
------------

Install the extension via composer: [trilobit-gmbh/contao-monitoring-scan-client-worker-update-googlemaps-installed](https://packagist.org/packages/trilobit-gmbh/contao-monitoring-scan-client-worker-update-googlemaps-installed).


Compatibility
-------------

- Contao version >= 3.5.35
- Contao version >= 4.4.20
- dlh_googlemaps >= 2.3


Dependency
----------

This extension is dependent on the following extensions:

- [[contao-monitoring/monitoring]](https://packagist.org/packages/contao-monitoring/monitoring)
- [[contao-monitoring/monitoring-scan-client]](https://packagist.org/packages/contao-monitoring/monitoring-scan-client)
- [[contao-monitoring/monitoring-scan-client-worker]](https://packagist.org/packages/contao-monitoring/monitoring-scan-client-worker)
