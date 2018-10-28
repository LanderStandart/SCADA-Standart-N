@echo off

set name=managerxp2
set logfile=update.log

set file_update_path=update.ini
set file_new_version=new_version.txt
set file_current_version=current_version.txt

chcp 1251>%logfile%
echo Начало работы >>%logfile%

if not exist wget.exe (
  echo Файл wget.exe отсутствует >>%logfile%
  goto :finish
)

if not exist %file_update_path% (
  echo Файл с настройками отсутствует >>%logfile%
  goto :finish
)

for /f "eol=# delims== tokens=1,2" %%i in (%file_update_path%) do (
  set %%i=%%j
)

if not exist %file_current_version% (
  echo Отсутствует файл с текущей версией >>%logfile%
  Set current_version=1
) else (
  For /F "usebackq tokens=* delims=" %%i In ("%file_current_version%") Do Set current_version=%%i
)
echo Текущая версия %current_version% >>%logfile%

if exist %file_new_version% (
  del %file_new_version%
)

echo Берем номер версии на сервере  >>%logfile%
echo http://www.standart-n.ru/update/%name%/%path%/update.txt >>%logfile%
wget -r -q -O "%file_new_version%" http://www.standart-n.ru/update/%name%/%path%/update.txt || goto :errorOnDownloadVersionNumber
For /F "usebackq tokens=* delims=" %%i In ("%file_new_version%") Do Set new_version=%%i
echo Версия на сервере %new_version% >>%logfile%

if %current_version% LSS %new_version% (

  if exist %name%_%new_version%.exe (
    del %name%_%new_version%.exe
  )
  echo Скачиваем новую версию >>%logfile%
  echo http://standart-n.ru/zclientxp/_releases/!update/%name%/%name%_%new_version%.exe >>%logfile%
  wget -r -q --show-progress -O "%name%_%new_version%.exe" http://standart-n.ru/zclientxp/_releases/!update/%name%/%name%_%new_version%.exe || goto :errorOnDownloadNewExe
  echo Откатываем старую версию %name%_%current_version%.exe >>%logfile%
  rename %name%.exe %name%_%current_version%.exe
  echo Переименовываем новую версию >>%logfile%
  rename %name%_%new_version%.exe %name%.exe
  echo Обновляем файл с номером версии >>%logfile%
  del %file_current_version%
  rename %file_new_version% %file_current_version%
  goto :finish

) else (

  echo Обновление не требуется >>%logfile%
  goto :finish

)

:errorOnDownloadVersionNumber
  echo Не удалось скачать файл с номером версии на сервере >>%logfile%
  goto :finish

:errorOnDownloadNewExe
  echo Не удалось скачать новую версию >>%logfile%
  goto :finish


:finish

  del %file_new_version%
  echo Запускаем программу %name%.exe >>%logfile%
  start %name%.exe || start zkassa.exe || start managerxp2.exe || start ZClientXP.exe || start spacepro.exe
  exit

